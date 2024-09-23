<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ImeiRepository.
 */
interface ImeiRepository extends RepositoryInterface
{
    public function insert($imeis);
}
