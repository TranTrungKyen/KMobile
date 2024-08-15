<?php

namespace App\Repositories\Eloquent;

use App\Models\Storage;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\StorageRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class StorageRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StorageRepositoryEloquent extends BaseRepository implements StorageRepository
{
    use RepositoryTraits;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Storage::class;
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
