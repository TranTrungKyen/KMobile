<?php

namespace App\Repositories\Eloquent;

use App\Models\Sale;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\SaleRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class SaleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SaleRepositoryEloquent extends BaseRepository implements SaleRepository
{
    use RepositoryTraits;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sale::class;
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
