<?php

namespace App\Services\Contracts;

/**
 * Interface OrderServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface OrderServiceInterface
{
    public function store($request);

    public function storeOrderDetail($orderId);

}
