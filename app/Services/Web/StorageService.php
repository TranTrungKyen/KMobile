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

    public function getAllStorages()
    {
        return $this->repository->all();
    }
}
