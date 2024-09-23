<?php

namespace App\Repositories\Eloquent;

use App\Models\Storage;
use App\Repositories\Contracts\StorageRepository;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class StorageRepositoryEloquent.
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
