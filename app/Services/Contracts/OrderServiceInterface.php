<?php

namespace App\Services\Contracts;

/**
 * Interface OrderServiceInterface.
 */
interface OrderServiceInterface
{
    public function store($request);

    public function storeOrderDetail($orderId);

    public function getAll();

    public function find($id);

    public function confirmOrder($request, $id);

    public function completeStatus($id);

    public function cancelStatus($id);

    public function getImeisByProductDetailId($id, $qty);

    public function ordersByUserId();

    public function getOrders();

    public function getRevenueForDate($start, $end);

    public function getTotalRevenueForDate($start, $end);

    public function getTotalOrderForDate($start, $end);

    public function getTotalOrderCancelForDate($start, $end);

    public function getTotalAllOrderForDate($start, $end);
}
