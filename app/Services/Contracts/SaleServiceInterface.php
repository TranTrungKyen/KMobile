<?php

namespace App\Services\Contracts;

/**
 * Interface SaleServiceInterface.
 */
interface SaleServiceInterface
{
    public function getAll();

    public function store($request);

    public function delete($id);

    public function storeProductDetailSale($request, $saleId);

    public function find($id);
}
