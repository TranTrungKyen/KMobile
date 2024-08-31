<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\ProductRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    use RepositoryTraits;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
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
        if ($this->isValidKey($filters, 'id')) {
            $model = $model->where('id', $filters['id']);
        }

        if ($this->isValidKey($filters, 'name')) {
            $model = $model->where('name', $filters['name']);
        }

        if ($this->isValidKey($filters, 'name_like')) {
            $model = $model->where('name', 'like', "%" . $filters['name_like'] . "%");
        }

        if ($this->isValidKey($filters, 'brand_id')) {
            $model = $model->where('brand_id', $filters['brand_id']);
        }

        if ($this->isValidKey($filters, 'category_id')) {
            $model = $model->where('category_id', $filters['category_id']);
        }
        return $model;
    }

    public function getAllSortDescAndPaginate($perPage) 
    {
        return $this->model->where('active', true)
        ->whereHas('productDetails')
        ->orderBy('updated_at', 'desc')
        ->paginate($perPage);
    }

    public function findByFiltersPaginated($filters, $perPage)
    {
        return $this->buildQuery($this->model->newQuery(), $filters)
                    ->orderBy('updated_at', 'desc')
                    ->paginate($perPage);
    }
}
