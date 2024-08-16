<?php

namespace App\Services\Contracts;

/**
 * Interface ProductDetailServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface ProductDetailServiceInterface
{
    public function store($dataProductDetailForm, $productId);
}
