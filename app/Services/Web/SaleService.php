<?php

namespace App\Services\Web;

use App\Repositories\Contracts\SaleRepository;
use App\Services\Contracts\SaleServiceInterface;
use App\Traits\FileTrait;

/**
 * Class SaleService.
 *
 * @package namespace App\Services\Web;
 */
class SaleService implements SaleServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(SaleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllSales() 
    {
        return $this->repository->all();
    }
}
