<?php

namespace App\Services\Web;

use App\Repositories\Contracts\NewsRepository;
use App\Services\Contracts\NewsServiceInterface;
use App\Traits\FileTrait;

/**
 * Class NewsService.
 */
class NewsService implements NewsServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }
}
