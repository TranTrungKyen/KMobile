<?php

namespace App\Services\Contracts;

/**
 * Interface CategoryServiceInterface.
 */
interface CategoryServiceInterface
{
    public function getAll();

    public function store($request);

    public function update($request, $id);

    public function delete($id);

    public function getCategoryOrderByQtyProduct();
}
