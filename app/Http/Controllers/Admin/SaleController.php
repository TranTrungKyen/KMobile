<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\SaleCreateRequest;
use App\Services\Contracts\ProductDetailServiceInterface;
use App\Services\Contracts\SaleServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    protected $saleService;
    protected $productDetailService;

    public function __construct(
        ProductDetailServiceInterface $productDetailService,
        SaleServiceInterface $saleService)
    {
        $this->saleService = $saleService;
        $this->productDetailService = $productDetailService;
    }

    public function index () 
    {   
        $sales = $this->saleService->getAll();
        return view('admin.sale.index', ['sales' => $sales]);
    }

    public function create (Request $request) 
    {   
        $condition = [];
        if($request->has('name') && $request->name) {
            $condition['name'] = $request->name; 
        }
        
        $productDetails = $this->productDetailService->getListProductDetailByName($condition['name'] ?? '');
        return view('admin.sale.create', ['productDetails' => $productDetails]);
    }

    public function store (SaleCreateRequest $request) {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('admin.sale.create'),
            "message" => __('content.common.notify_message.error.add'),
        ];
        DB::beginTransaction();
        try {
            $saleId = $this->saleService->store($request);
            $isStoreSuccess = $this->saleService->storeProductDetailSale($request, $saleId);
            DB::commit();
            if($isStoreSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('admin.sale.index'),
                    "message" => __('content.common.notify_message.success.add'),
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return response()->json($notification);
    }

    public function delete ($id) 
    {
        try {
            $this->saleService->delete($id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('admin.sale.index')->with('error', __('content.common.notify_message.error.delete'));
        }
        return redirect()->route('admin.sale.index')->with('success', __('content.common.notify_message.success.delete'));
    }

    public function detail ($id) 
    {
        $sale = $this->saleService->find($id);
        return view('admin.sale.detail', ['sale' => $sale]);
    }
}
