<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductDetailCreateRequest;
use App\Services\Contracts\BrandServiceInterface;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\ColorServiceInterface;
use App\Services\Contracts\ProductDetailServiceInterface;
use App\Services\Contracts\ProductImageServiceInterface;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\StorageServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productService;
    protected $productDetailService;
    protected $productImageService;
    protected $categoryService;
    protected $brandService;
    protected $storageService;
    protected $colorService;

    public function __construct (
        ProductServiceInterface $productService, 
        ProductDetailServiceInterface $productDetailService, 
        ProductImageServiceInterface $productImageService, 
        CategoryServiceInterface $categoryService, 
        BrandServiceInterface $brandService,
        StorageServiceInterface $storageService,
        ColorServiceInterface $colorService,
        )
    {
        $this->productService = $productService;
        $this->productDetailService = $productDetailService;
        $this->productImageService = $productImageService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->storageService = $storageService;
        $this->colorService = $colorService;
    }

    public function index () 
    {   
        $products = $this->productService->getAll();
        return view('admin.product.index', ['products' => $products]);
    }

    public function create () 
    {   
        $brands = $this->brandService->getAll();
        $categories = $this->categoryService->getAll();
        return view('admin.product.create', 
        [
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function storeProduct (ProductCreateRequest $request) 
    {
        $request->session()->put('productForm', $request->all());  
        return redirect()->route('admin.product.create-detail');
    }

    public function createDetail () 
    {   
        $colors = $this->colorService->getAll();
        $storages = $this->storageService->getAll();
        return view('admin.product.create-detail', 
        [
            'colors' => $colors,
            'storages' => $storages,
        ]);
    }
    
    public function store (ProductDetailCreateRequest $request) 
    {   
        $notification = [
            "status" => false,
            "redrirectRoute" => route('admin.product.create-detail'),
            "message" => __('content.common.notify_message.error.add'),
        ];
        DB::beginTransaction();
        try {
            $requestProductForm = $request->session()->get('productForm');
            $productId = $this->productService->store($requestProductForm);
            $isStoreDetailsSuccess = $this->productDetailService->store($request, $productId);
            $isStoreImagesSuccess = $this->productImageService->store($request, $productId);
            DB::commit();
            if($productId && $isStoreDetailsSuccess && $isStoreImagesSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('admin.product.index'),
                    "message" => __('content.common.notify_message.success.add'),
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function detail ($id) 
    {   
        $product = $this->productService->getProductDetailById($id);
        return view('admin.product.detail', 
        [
            'product' => $product,
        ]);
    }

    public function delete ($id) 
    {   
        try {
            $this->productService->delete($id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('admin.product.index')->with('error', __('content.common.notify_message.error.delete'));
        }
        return redirect()->route('admin.product.index')->with('success', __('content.common.notify_message.success.delete'));
    }

    public function active($id) 
    {   
        $statusMessage = 'active';
        DB::beginTransaction();
        try {
            $isActive = $this->productService->active($id);
            if($isActive) {
                $statusMessage = 'unlock';
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect()->route('admin.product.index')->with('error', __('content.common.notify_message.error')[$statusMessage]);
        }
        return redirect()->route('admin.product.index')->with('success', __('content.common.notify_message.success')[$statusMessage]);
    }
}
