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

    public function getAll() 
    {
        return $this->repository->orderBy('updated_at', 'desc')->all();
    }

    public function getAllSortDescAndPaginate() 
    {
        return $this->repository->getAllSortDescAndPaginate();
    }

    public function store($data)
    {
        return $this->repository->create($data)->id;
    }

    public function getProductDetailById($id)
    {
        return $this->repository->with(['productDetails', 'images'])->find($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
