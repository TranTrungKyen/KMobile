<?php

namespace App\Services\Web;

use App\Repositories\Contracts\ProductDetailSaleRepository;
use App\Repositories\Contracts\SaleRepository;
use App\Services\Contracts\SaleServiceInterface;
use App\Traits\FileTrait;

/**
 * Class SaleService.
 *
 * @package namespace App\Services\Web;
 */
class SaleService implements SaleServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;
    protected $productDetailSaleRepository;

    public function __construct(
        ProductDetailSaleRepository $productDetailSaleRepository,
        SaleRepository $repository)
    {
        $this->repository = $repository;
        $this->productDetailSaleRepository = $productDetailSaleRepository;
    }

    public function getAll () 
    {
        return $this->repository->orderBy('updated_at', 'desc')->all();
    }

    public function store ($request) 
    {
        $data = [
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'description' => $request->description
        ];
        return $this->repository->create($data)->id;
    }

    public function storeProductDetailSale ($request, $saleId) 
    {
        foreach ($request->productDetailIds as $key => $productDetailId) {
            $data = [
                'product_detail_id' => $productDetailId,
                'sale_id' => $saleId,
                'discount' => $request->discounts[$key],
                'price' => $request->prices[$key],
            ];

            $this->productDetailSaleRepository->create($data);
        }
        
        return true;
    }

    public function delete ($id)
    {
        return $this->repository->delete($id);
    }

    public function find ($id)
    {
        return $this->repository->find($id);
    }
}
