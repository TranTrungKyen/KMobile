<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\SaleServiceInterface;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleServiceInterface $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index () 
    {   
        $sales = $this->saleService->getAll();
        return view('admin.sale.index', ['sales' => $sales]);
    }
}
