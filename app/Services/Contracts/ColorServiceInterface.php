<?php

namespace App\Services\Contracts;

/**
 * Interface ColorServiceInterface.
 */
interface ColorServiceInterface
{
    public function getAll();

    public function store($request);

    public function update($request, $id);

    public function find($id);

    public function delete($id);
}
