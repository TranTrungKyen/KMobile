<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddToCartRequest;
use App\Http\Requests\UserUpdateCartRequest;
use App\Models\ProductDetail;
use App\Services\Contracts\ProductDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    protected $productDetailService;

    public function __construct(ProductDetailServiceInterface $productDetailService)
    {
        $this->productDetailService = $productDetailService;
    }

    public function index()
    {
        $cart = Cart::instance('cart');
        $cartItems = $cart->content();
        return view('user.cart', [
            'cart' => $cart,
            'cartItems' => $cartItems,
        ]);
    }

    public function store(UserAddToCartRequest $request)
    {
        $cart = Cart::instance('cart');
        try {
            $productDetail = $this->productDetailService->find($request->product_detail_id);
            $price = ($productDetail->price_current) ? $productDetail->price_current : $productDetail->price;
            $cart->add($productDetail->id, $productDetail->product->name, $request->qty, $price)->associate(ProductDetail::class);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', __('content.add_to_cart_form.message.error'));
        }
        return redirect()->route('user.cart.index')->with('success', __('content.add_to_cart_form.message.success'));
    }

    public function update(UserUpdateCartRequest $request)
    {
        $notification = [
            "status" => false,
            "message" => __('content.update_cart_form.message.error'),
        ];
        try {
            Cart::instance('cart')->update($request->rowId, $request->qty);
            $notification = [
                "status" => true,
                "redrirectRoute" => route('user.cart.index'),
                "message" => __('content.update_cart_form.message.success'),
            ];
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function delete(Request $request)
    {
        try {
            Cart::instance('cart')->remove($request->rowId);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('user.cart.index')->with('error', __('content.common.notify_message.error.delete'));
        }
        return redirect()->route('user.cart.index')->with('success', __('content.common.notify_message.success.delete'));
    }

    public function clear()
    {
        try {
            Cart::instance('cart')->destroy();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('user.cart.index')->with('error', __('content.common.notify_message.error.clear_cart'));
        }
        return redirect()->route('user.cart.index')->with('success', __('content.common.notify_message.success.clear_cart'));
    }
}
