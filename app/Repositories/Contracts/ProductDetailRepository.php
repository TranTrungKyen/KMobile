<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductDetailRepository.
 */
interface ProductDetailRepository extends RepositoryInterface
{
    public function findProductDetailsByProductName($name);
}
