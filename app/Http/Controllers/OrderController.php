<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserOrderCreateRequest;
use App\Services\Contracts\OrderServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store (UserOrderCreateRequest $request) {
        $notification = [
            "status" => false,
            "message" => __('content.create_order_form.message.error'),
        ];
        DB::beginTransaction();
        try {
            $orderId = $this->orderService->store($request);
            $isSuccess = $this->orderService->storeOrderDetail($orderId);
            DB::commit();
            if ($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('user.product-page'),
                    "message" => __('content.create_order_form.message.success'),
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }
}
