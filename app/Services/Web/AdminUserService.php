<?php

namespace App\Services\Web;

use App\Repositories\Contracts\AdminUserRepository;
use App\Services\Contracts\AdminUserServiceInterface;

/**
 * Class AdminUserService.
 *
 * @package namespace App\Services\Web;
 */
class AdminUserService implements AdminUserServiceInterface
{
    protected $repository;

    public function __construct(AdminUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllUsers() {
        return $this->repository->all();
    }
}
