<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateImeiOrderDetailRequest;
use App\Services\Contracts\OrderServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAll();
        return view('admin.order.index', ['orders' => $orders]);
    }

    public function detail($id)
    {
        $order = $this->orderService->find($id);
        $imeisDemo = new Collection();
        foreach ($order->orderDetails as $key => $itemDetail) {
            $imeisDemo = $imeisDemo->push($this->orderService->getImeisByProductDetailId($itemDetail->product_detail_id, $itemDetail->qty));
        }
        return view('admin.order.detail', [
            'order' => $order,
            'imeisDemo' => $imeisDemo
        ]);
    }

    public function detailOther($id)
    {
        $order = $this->orderService->find($id);
        $imeisDemo = new Collection();
        foreach ($order->orderDetails as $key => $itemDetail) {
            $imeisDemo = $imeisDemo->push($this->orderService->getImeisByProductDetailId($itemDetail->product_detail_id, $itemDetail->qty));
        }
        return view('admin.order.detail-other', ['order' => $order]);
    }

    public function confirmStatus(ValidateImeiOrderDetailRequest $request, $id) 
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('admin.order.index'),
            "message" => __('content.common.notify_message.error.order_confirm'),
        ];
        DB::beginTransaction();
        try {
            $isSuccess = $this->orderService->confirmOrder($request, $id);
            DB::commit();
            if($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('admin.order.index'),
                    "message" => __('content.common.notify_message.success.order_confirm'),
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function completeStatus($id)
    {
        $routeName = 'admin.order.index';
        if (auth()->user()->role_id == ROLES['user']) {
            $routeName = 'user.order.index';
        }
        try {
            $isSuccess = $this->orderService->completeStatus($id);
            if(!$isSuccess) {
                return redirect()->back()->with('error', __('content.common.notify_message.error.update'));
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', __('content.common.notify_message.error.update'));
        }
        return redirect()->route($routeName)->with('success', __('content.common.notify_message.success.update'));
    }

    public function cancelStatus($id)
    {
        $routeName = 'admin.order.index';
        if (auth()->user()->role_id == ROLES['user']) {
            $routeName = 'user.order.index';
        }
        DB::beginTransaction();
        try {
            $isSuccess = $this->orderService->cancelStatus($id);
            DB::commit();
            if(!$isSuccess) {
                return redirect()->back()->with('error', __('content.common.notify_message.error.order_cancel'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect()->back()->with('error', __('content.common.notify_message.error.order_cancel'));
        }
        return redirect()->route($routeName)->with('success', __('content.common.notify_message.success.order_cancel'));
    }
}
