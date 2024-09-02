<?php

namespace App\Services\Contracts;

/**
 * Interface BrandServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface BrandServiceInterface
{
    public function getAll();

    public function getBrand($id);

    public function store($request);

    public function update($request, $id);

    public function delete($id);

    public function getBrandsOrderByQtyProduct();
}
