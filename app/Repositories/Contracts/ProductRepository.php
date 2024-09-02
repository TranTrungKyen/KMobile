<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface ProductRepository extends RepositoryInterface
{
    public function getAllSortDescAndPaginate($perPage);
    
    public function findByFiltersPaginated($filters, $perPage);

    public function getProductsSortedByNewestAndMostPurchased();
}
