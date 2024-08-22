<?php

namespace App\Repositories\Eloquent;

use App\Models\ProductDetailSale;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\ProductDetailSaleRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProductDetailSaleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
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
