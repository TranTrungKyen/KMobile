<?php

namespace App\Repositories\Eloquent;

use App\Models\ProductDetail;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\ProductDetailRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProductDetailRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductDetailRepositoryEloquent extends BaseRepository implements ProductDetailRepository
{
    use RepositoryTraits;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductDetail::class;
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

    public function findProductDetailsByProductName($name)
    {
        return $this->model->with(['product', 'color', 'storage'])
        ->whereHas('product', function($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%')
                  ->where('active', true)
                  ->whereNull('deleted_at');
        })->orderBy('updated_at', 'desc')
          ->get();
    }
}
