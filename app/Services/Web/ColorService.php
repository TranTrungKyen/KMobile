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
}
