<?php

namespace App\Services\Contracts;

/**
 * Interface ProductDetailServiceInterface.
 */
interface ProductDetailServiceInterface
{
    public function getAll();

    public function store($dataProductDetailForm, $productId);

    public function getListProductDetailByName($name);

    public function find($id);
}
