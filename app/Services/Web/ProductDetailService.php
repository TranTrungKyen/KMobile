<?php

namespace App\Services\Web;

use App\Repositories\Contracts\ProductDetailRepository;
use App\Services\Contracts\ProductDetailServiceInterface;
use App\Traits\FileTrait;

/**
 * Class ProductDetailService.
 *
 * @package namespace App\Services\Web;
 */
class ProductDetailService implements ProductDetailServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(ProductDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($dataProductDetailForm, $productId)
    {
        foreach ($dataProductDetailForm->color_id as $key => $color_id) {
            $data = [
                'product_id' => $productId,
                'color_id' => $color_id,
                'storage_id' => $dataProductDetailForm->storage_id[$key],
                'qty' => $dataProductDetailForm->qty[$key],
                'price' => $dataProductDetailForm->price[$key],
            ];

            $this->repository->create($data);
        }
        return true;
    }
}
