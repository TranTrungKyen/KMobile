<?php

namespace App\Services\Contracts;

/**
 * Interface ProductImageServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface ProductImageServiceInterface
{
    public function store($dataProductDetailForm, $productId);
}
