<?php

namespace App\Services\Contracts;

/**
 * Interface SaleServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface SaleServiceInterface
{
    public function getAll ();

    public function store ($request);

    public function delete ($id);

    public function storeProductDetailSale ($request, $saleId);
    
    public function find ($id);
}
