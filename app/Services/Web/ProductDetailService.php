<?php

namespace App\Services\Web;

use App\Repositories\Contracts\ImeiRepository;
use App\Repositories\Contracts\ProductDetailRepository;
use App\Services\Contracts\ProductDetailServiceInterface;
use App\Traits\FileTrait;
use Carbon\Carbon;

/**
 * Class ProductDetailService.
 *
 * @package namespace App\Services\Web;
 */
class ProductDetailService implements ProductDetailServiceInterface
{
    use FileTrait {
        delete as traitDelete;
    }

    protected $repository;
    protected $imeiRepository;

    public function __construct(
        ProductDetailRepository $repository,
        ImeiRepository $imeiRepository)
    {
        $this->repository = $repository;
        $this->imeiRepository = $imeiRepository;
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

            $productDetails[] = $this->repository->create($data);
        }

        foreach ($productDetails as $key => $detail) {
            $startImei = $dataProductDetailForm->imei[$key];
            $datas = [];
            for ($i = 0; $i < $detail->qty; $i++) {
                $currentTime = Carbon::now();
                $datas[] = [
                    'imei' => $startImei + $i,
                    'product_detail_id' => $detail->id,
                    'created_at' => $currentTime,
                    'updated_at' => $currentTime,
                ];
            }
            $this->imeiRepository->insert($datas);
        }
        return true;
    }

    public function getAll()
    {
        return $this->repository->orderBy('updated_at', 'desc')->all();
    }

    public function getListProductDetailByName($name = '') 
    {
        return $this->repository->findProductDetailsByProductName($name);
    }
}
