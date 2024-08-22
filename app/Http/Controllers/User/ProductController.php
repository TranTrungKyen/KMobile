<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ProductServiceInterface;

class ProductController extends Controller
{
    protected $productService;

    public function __construct (ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }
    
    public function products() 
    {
        $listProduct = $this->productService->getAllSortDescAndPaginate(PER_PAGE['PRODUCT']);
        return view('user.product', ['listProduct' => $listProduct]);
    }

    public function productDetail($id) 
    {
        $product = $this->productService->getProductDetailById($id);
        $listProduct = $this->productService->getProductsByBrandId($product->brand_id);
        return view('user.product-detail', [
            'product' => $product,
            'listProduct' => $listProduct,
        ]);
    }
}
