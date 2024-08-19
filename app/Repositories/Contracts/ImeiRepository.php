<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ImeiRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface ImeiRepository extends RepositoryInterface
{
    public function insert($imeis);
}
