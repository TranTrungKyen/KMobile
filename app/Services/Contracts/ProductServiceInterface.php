<?php

namespace App\Services\Contracts;

/**
 * Interface ProductServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface ProductServiceInterface
{
    public function getAll();

    public function getProductDetailById($id);

    public function getProductsByBrandId($brandId);

    public function store($data);

    public function delete($id);

    public function getAllSortDescAndPaginate($perPage);

    public function getProductByName($perPage, $key);
    
    public function getProductByBrandId($perPage, $brandId);

    public function getProductByCategoryId($perPage, $categoryId);

    public function active($id); 

    public function getProductsSortedByNewestAndMostPurchased();
}
