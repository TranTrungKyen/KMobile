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
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(AdminUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll() 
    {
        return $this->repository->orderBy('updated_at', 'desc')->all();
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
            'password' => bcrypt($request->password),
            'role_id' => ROLES['employee'],
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'description' => $request->description,
            'avatar' => $avatar,
        ];
        return $this->repository->create($data);
    }

    public function getUser($id)
    {
        return $this->repository->find($id);
    }

    public function update($request ,$id)
    {
        $user = $this->repository->firstById($id);
        $avatar = $user->avatar;
        if ($request->hasFile('avatar')) {
            if (!is_null($user->avatar)) {
                $this->traitDelete($user->avatar);
            }
            $avatar = $this->upload($request->file('avatar'), AVT_URL['STORAGE_PATH']);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'description' => $request->description,
            'avatar' => $avatar,
        ];

        return $this->repository->update($data, $id);
    }

    public function active($id)
    {
        $toggleStatusActive = !$this->repository->find($id)->active;
        $data = [
            'active' => $toggleStatusActive,
        ];
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function resetPassword($id)
    {
        $data = [
            'password' => bcrypt(PASSWORD_DEFAULT_1),
        ];
        return $this->repository->update($data, $id);
    }
}
