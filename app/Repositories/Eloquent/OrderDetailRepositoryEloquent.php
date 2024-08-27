<?php

namespace App\Repositories\Eloquent;

use App\Models\OrderDetail;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\OrderDetailRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class OrderDetailRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderDetailRepositoryEloquent extends BaseRepository implements OrderDetailRepository
{
    use RepositoryTraits;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderDetail::class;
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
