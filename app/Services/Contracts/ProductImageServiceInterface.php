<?php

namespace App\Services\Contracts;

/**
 * Interface ProductImageServiceInterface.
 */
interface ProductImageServiceInterface
{
    public function store($dataProductDetailForm, $productId);
}
