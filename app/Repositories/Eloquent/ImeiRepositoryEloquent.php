<?php

namespace App\Repositories\Eloquent;

use App\Models\Imei;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\ImeiRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ImeiRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ImeiRepositoryEloquent extends BaseRepository implements ImeiRepository
{
    use RepositoryTraits;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Imei::class;
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

    public function insert($imeis) 
    {
        return $this->model->insert($imeis);
    }
}
