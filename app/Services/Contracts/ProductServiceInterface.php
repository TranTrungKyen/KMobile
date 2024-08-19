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

    public function store($data);

    public function delete($id);

    public function getAllSortDescAndPaginate();
}
