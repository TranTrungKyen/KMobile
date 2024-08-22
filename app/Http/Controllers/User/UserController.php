<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Web\AdminUserService;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(AdminUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() 
    {
        return view('user.index');
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
