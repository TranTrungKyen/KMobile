<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepository;
use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class OrderRepositoryEloquent.
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    use RepositoryTraits;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function buildQuery($model, $filters)
    {
        return $model;
    }

    public function getRevenueForDate($startAt, $endAt)
    {
        $orders = $this->model
            ->whereBetween('created_at', [$startAt, $endAt])
            ->where('status', '!=', ORDER_CANCELED)
            ->get();

        // GroupBy year month and sum total amount
        $revenues = $orders->groupBy(function ($order) {
            return $order->created_at->format('Y-m');
        })->map(function ($ordersGroup) {
            return $ordersGroup->sum('total_price');
        });

        return $revenues;
    }

    public function getTotalRevenueForDate($startAt, $endAt)
    {
        $orders = $this->model->where('status', '!=', ORDER_CANCELED)
            ->whereBetween('created_at', [$startAt, $endAt])
            ->get();

        $totalRevenue = $orders->sum(function ($order) {
            return $order->total_price;
        });

        return $totalRevenue;
    }
}
