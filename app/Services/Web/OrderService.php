<?php

namespace App\Services\Web;

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
    protected $orderDetailRepository;
    protected $productDetailRepository;

    public function __construct(
        OrderRepository $repository,
        OrderDetailRepository $orderDetailRepository,
        ProductDetailRepository $productDetailRepository)
    {
        $this->repository = $repository;
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
            'status' => ORDER_STATUS['PENDING'],
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
            $productDetailQty = $this->productDetailRepository->find($item->id)->qty;
            if($item->qty > $productDetailQty) {
                return false;
            } 
            $data = [
                'order_id' => $orderId,
                'product_detail_id' => $item->id,
                'qty' => $item->qty,
                'price' => $item->price,
                'total_price' => floatval($item->subtotal(false, '', ''))  
            ];

            $this->orderDetailRepository->create($data);
        }
        return true;
    }

}
