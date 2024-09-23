<?php

namespace App\Repositories\Eloquent;

use App\Models\ProductDetailSale;
use App\Repositories\Contracts\ProductDetailSaleRepository;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductDetailSaleRepositoryEloquent.
 */
class ProductDetailSaleRepositoryEloquent extends BaseRepository implements ProductDetailSaleRepository
{
    use RepositoryTraits;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductDetailSale::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function buildQuery($model, $filters)
    {
        return $model;
    }
}
