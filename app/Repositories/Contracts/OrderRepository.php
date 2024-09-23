<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderRepository.
 */
interface OrderRepository extends RepositoryInterface
{
    public function getTotalRevenueForDate($startAt, $endAt);
}
