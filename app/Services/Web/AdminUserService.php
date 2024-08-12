<?php

namespace App\Services\Web;

use App\Repositories\Contracts\AdminUserRepository;
use App\Services\Contracts\AdminUserServiceInterface;
use App\Traits\FileTrait;

/**
 * Class AdminUserService.
 *
 * @package namespace App\Services\Web;
 */
class AdminUserService implements AdminUserServiceInterface
{
    use FileTrait;

    protected $repository;

    public function __construct(AdminUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllUsers() 
    {
        return $this->repository->all();
    }

    public function store($request) 
    {
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = $this->upload($request->file('avatar'), AVT_URL['STORAGE_PATH']);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id ?? 3,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'description' => $request->description,
            'active' => true,
            'avatar' => $avatar,
        ];
        return $this->repository->create($data);
    }
}
