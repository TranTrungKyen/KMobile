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

    public function getAllSortDescAndPaginate($perPage) 
    {
        return $this->repository->getAllSortDescAndPaginate($perPage);
    }

    public function store($data)
    {
        return $this->repository->create($data)->id;
    }

    public function getProductDetailById($id)
    {
        return $this->repository->with([
            'productDetails.color', 
            'productDetails.storage', 
            'images',
            ])->find($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function getProductsByBrandId($brandId)
    {
        return $this->repository->findWhere([
            'active'=> true,
            'brand_id'=> $brandId,
            ['productDetails','HAS',function($query){}], //whereHas
        ]);
    }

    public function getProductByName($perPage, $key)
    {
        $filters = ['name_like' => $key];
        return $this->repository->findByFiltersPaginated($filters, $perPage);
    }

    public function getProductByBrandId($perPage, $brandId)
    {
        $filters = ['brand_id' => $brandId];
        return $this->repository->findByFiltersPaginated($filters, $perPage);
    }

    public function getProductByCategoryId($perPage, $categoryId)
    {
        $filters = ['category_id' => $categoryId];
        return $this->repository->findByFiltersPaginated($filters, $perPage);
    }
}
