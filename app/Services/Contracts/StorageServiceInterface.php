<?php

namespace App\Services\Contracts;

/**
 * Interface StorageServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface StorageServiceInterface
{
    public function getAll();

    public function store($request);

    public function update($request, $id);

    public function delete($id);
}
