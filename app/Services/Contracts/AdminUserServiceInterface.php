<?php

namespace App\Services\Contracts;

/**
 * Interface AdminUserServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface AdminUserServiceInterface
{
    public function getAll();

    public function store($request);

    public function getUser($id);

    public function update($request ,$id);

    public function active($id);

    public function delete($id);
    
    public function resetPassword($id);

    public function getCustomers();

    public function getEmployees();

    public function register ($request);

    public function changePassword($request, $id);
}
