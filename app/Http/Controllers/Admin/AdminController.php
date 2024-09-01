<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\AdminUserServiceInterface;
use App\Services\Contracts\OrderServiceInterface;

class AdminController extends Controller
{

    protected $userService;
    protected $orderService;

    public function __construct(
        OrderServiceInterface $orderService,
        AdminUserServiceInterface $userService,
        )
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function index() 
    {
        $customers = $this->userService->getCustomers();
        $employees = $this->userService->getEmployees();
        $orders = $this->orderService->getOrders();
        $totalRevenue = $orders->sum(function ($order) {
            return $order->total_price;
        });
        return view('admin.index', [
            'customers' => $customers,
            'employees' => $employees,
            'orders' => $orders,
            'totalRevenue' => $totalRevenue,
        ]);
    }
}
