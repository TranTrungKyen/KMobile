<?php

namespace App\Services\Web;

use App\Repositories\Contracts\ProductRepository;
use App\Services\Contracts\ProductServiceInterface;
use App\Traits\FileTrait;

/**
 * Class ProductService.
 *
 * @package namespace App\Services\Web;
 */
class ProductService implements ProductServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProducts() 
    {
        return $this->repository->all();
    }
}
