<?php

namespace App\Repositories\Eloquent;

use App\Models\ProductImage;
use App\Repositories\Contracts\ProductImageRepository;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductImageRepositoryEloquent.
 */
class ProductImageRepositoryEloquent extends BaseRepository implements ProductImageRepository
{
    use RepositoryTraits;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductImage::class;
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
        //
    }
}
