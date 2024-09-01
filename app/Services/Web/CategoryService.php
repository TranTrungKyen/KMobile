<?php

namespace App\Services\Web;

use App\Repositories\Contracts\CategoryRepository;
use App\Services\Contracts\CategoryServiceInterface;

/**
 * Class CategoryService.
 *
 * @package namespace App\Services\Web;
 */
class CategoryService implements CategoryServiceInterface
{
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll() 
    {
        return $this->repository->all();
    }

    public function store($request)
    {
        $data = [
            'name' => $request->name,
        ];
        return $this->repository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'name' => $request->name,
        ];
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
