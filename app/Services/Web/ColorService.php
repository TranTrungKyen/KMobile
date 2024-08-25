<?php

namespace App\Services\Web;

use App\Repositories\Contracts\ColorRepository;
use App\Services\Contracts\ColorServiceInterface;
use App\Traits\FileTrait;

/**
 * Class ColorService.
 *
 * @package namespace App\Services\Web;
 */
class ColorService implements ColorServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(ColorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll() 
    {
        return $this->repository->all();
    }

    public function store($request)
    {
        return $this->repository->create(['name' => $request->name ]);
    }

    public function find($id) 
    {
        return $this->repository->find($id);
    }

    public function update($request, $id)
    {
        return $this->repository->update(['name' => $request->name], $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
