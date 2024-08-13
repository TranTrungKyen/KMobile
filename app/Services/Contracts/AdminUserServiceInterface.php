<?php

namespace App\Services\Contracts;

/**
 * Interface AdminUserServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface AdminUserServiceInterface
{
    public function getAllUsers();

    public function store($request);

    public function getUser($id);

    public function update($request ,$id);

    public function active($id);

    public function delete($id);
}
