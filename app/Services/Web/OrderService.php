<?php

namespace App\Services\Web;

use App\Repositories\Contracts\ImeiRepository;
use App\Repositories\Contracts\OrderDetailRepository;
use App\Repositories\Contracts\OrderRepository;
use App\Repositories\Contracts\ProductDetailRepository;
use App\Services\Contracts\OrderServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

/**
 * Class OrderService.
 *
 * @package namespace App\Services\Web;
 */
class OrderService implements OrderServiceInterface
{
    protected $repository;
    protected $imeiRepository;
    protected $orderDetailRepository;
    protected $productDetailRepository;

    public function __construct(
        OrderRepository $repository,
        ImeiRepository $imeiRepository,
        OrderDetailRepository $orderDetailRepository,
        ProductDetailRepository $productDetailRepository)
    {
        $this->repository = $repository;
        $this->imeiRepository = $imeiRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->productDetailRepository = $productDetailRepository;
    }

    public function store($request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'user_name' => $request->user_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note,
            'status' => ORDER_STATUS[0],
        ];
        return $this->repository->create($data)->id;
    }

    public function storeOrderDetail($orderId) 
    {
        $cartItems = Cart::instance('cart')->content();
        if ($cartItems->count() < 1) {
            return false;
        }

        foreach ($cartItems as $item) {
            $productDetailId = $item->id;
            $productDetailQty = $this->productDetailRepository->find($productDetailId)->qty;
            if($item->qty > $productDetailQty) {
                return false;
            } 
            // update qty product detail
            $newQty = $productDetailQty - $item->qty;
            $dataProductDetail = [
                'qty' => $newQty,
            ];
            $this->productDetailRepository->update($dataProductDetail, $productDetailId);

            // create order detail
            $data = [
                'order_id' => $orderId,
                'product_detail_id' => $productDetailId,
                'qty' => $item->qty,
                'price' => $item->price,
                'total_price' => floatval($item->subtotal(false, '', ''))  
            ];

            $this->orderDetailRepository->create($data);
        }
        return true;
    }

    public function getAll()
    {
        return $this->repository->orderBy('updated_at', 'desc')->all();
    }

    public function find($id)
    {
        return $this->repository->with(['orderDetails.productDetail'])->find($id);
    }

    public function getOrders()
    {
        return $this->repository->orderBy('created_at', 'desc')->findWhereNotIn('status', [ORDER_CANCELED]);
    }

    public function confirmOrder($request, $id) 
    {
        $this->repository->update(['status' => ORDER_STATUS[1]], $id);
        $imeis = $request->imei;
        foreach ($imeis as $key => $imei) {
            $data = [
                'is_sold' => true,
                'order_detail_id' => $request->order_detail_id[$key],
            ];

            $this->imeiRepository->update($data, $imei);
        }
        return true;
    }

    public function completeStatus($id) 
    {
        $this->repository->update(['status' => ORDER_STATUS[2]], $id);
        return true;
    }

    public function cancelStatus($id) 
    {
        $order = $this->repository->update(['status' => ORDER_CANCELED], $id);
        $orderDetails = $order->orderDetails;
        if(!empty($orderDetails->first()->imeis->first())) {
            foreach ($orderDetails as $keyOrderDetail => $orderDetail) {
                // update qty product detail
                $newQty = $orderDetail->productDetail->qty + $orderDetail->qty;
                $dataProductDetail = [
                    'qty' => $newQty,
                ];
                $this->productDetailRepository->update($dataProductDetail, $orderDetail->product_detail_id);

                // update status imei
                foreach ($orderDetail->imeis as $key => $imeiItem) {
                    $data = [
                        'is_sold' => false,
                        'order_detail_id' => null,
                    ];

                    $this->imeiRepository->update($data, $imeiItem->imei);
                }
            }
        }
        return true;
    }

    public function getImeisByProductDetailId($id, $qty)
    {
        return $this->imeiRepository->findWhere([
            'is_sold' => false ,
            'product_detail_id' => $id,
        ])->take($qty);
    }

    public function ordersByUserId() 
    {
        if(empty(auth()->user()->id)) {
            return false;
        }
        return $this->repository->orderBy('created_at', 'desc')->findByField('user_id', auth()->user()->id);
    }

    public function getRevenueForDate($start, $end)
    {
        return $this->repository->getRevenueForDate($start, $end);
    }

    public function getTotalRevenueForDate($start, $end)
    {
        return $this->repository->getTotalRevenueForDate($start, $end);
    }
}
