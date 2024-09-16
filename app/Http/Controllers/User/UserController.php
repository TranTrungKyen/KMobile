<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUser\UserUpdateRequest;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Contracts\AdminUserServiceInterface;
use App\Services\Contracts\BrandServiceInterface;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;
    protected $brandService;
    protected $categoryService;
    protected $productService;

    public function __construct(
        BrandServiceInterface $brandService,
        AdminUserServiceInterface $userService,
        ProductServiceInterface $productService,
        CategoryServiceInterface $categoryService
        )
    {
        $this->userService = $userService;
        $this->brandService = $brandService;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index() 
    {
        $brands = $this->brandService->getBrandsOrderByQtyProduct();
        $categories = $this->categoryService->getCategoryOrderByQtyProduct();
        $products = $this->productService->getProductsSortedByNewestAndMostPurchased();
        return view('user.index', [
            'brands' => $brands,
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function detail() 
    {
        $user = $this->userService->getUser(auth()->user()->id);
        return view('user.info.index', ['user' => $user]);
    }

    public function edit() 
    {
        $user = $this->userService->getUser(auth()->user()->id);
        return view('user.info.edit', ['user' => $user]);
    }

    public function editPassword() 
    {
        return view('user.info.change-password');
    }

    public function update(UserUpdateRequest $request) 
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('user.info.edit'),
            "message" => __('content.common.notify_message.error.update'),
        ];
        try {
            $isSuccess = $this->userService->update($request ,auth()->user()->id);
            if($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('user.info.index'),
                    "message" => __('content.common.notify_message.success.update'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function changePassword(UserChangePasswordRequest $request) 
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('user.info.edit-password'),
            "message" => __('content.common.notify_message.error.update'),
        ];
        try {
        $isSuccess = $this->userService->changePassword($request ,auth()->user()->id);
            if($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('user.info.index'),
                    "message" => __('content.common.notify_message.success.update'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function register(UserRegisterRequest $request) 
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('user.login'),
            "message" => __('content.register_form.message.error'),
        ];
        try {
            $isSuccess = $this->userService->register($request);
            if($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('user.login'),
                    "message" => __('content.register_form.message.success'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }
}
