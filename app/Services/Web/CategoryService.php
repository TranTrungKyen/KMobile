<?php

namespace App\Services\Web;

use App\Repositories\Contracts\CategoryRepository;
use App\Services\Contracts\CategoryServiceInterface;
use App\Traits\FileTrait;

/**
 * Class CategoryService.
 *
 * @package namespace App\Services\Web;
 */
class CategoryService implements CategoryServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll() 
    {
        return $this->repository->all();
    }
}
