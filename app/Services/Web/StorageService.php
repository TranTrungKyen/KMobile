<?php

namespace App\Services\Web;

use App\Repositories\Contracts\StorageRepository;
use App\Services\Contracts\StorageServiceInterface;
use App\Traits\FileTrait;

/**
 * Class StorageService.
 *
 * @package namespace App\Services\Web;
 */
class StorageService implements StorageServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(StorageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->orderBy('updated_at', 'desc')->all();
    }

    public function store($request)
    {
        return $this->repository->create(['storage' => $request->storage ]);
    }

    public function update($request, $id)
    {
        return $this->repository->update(['storage' => $request->storage], $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
