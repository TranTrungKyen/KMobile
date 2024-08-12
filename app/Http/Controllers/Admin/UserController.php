<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUser\CreateUserRequest;
use App\Services\Contracts\AdminUserServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(AdminUserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index() 
    {
        $listUser = $this->userService->getAllUsers();
        return view('admin.user.index', compact('listUser'));
    }

    public function create() 
    {
        return view('admin.user.create');
    }

    public function store(CreateUserRequest $request)
    {
        try {
            $this->userService->store($request);
            return redirect()->route('admin.user.index')->with('success', __('content.common.notify_message.success.add'));
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('admin.user.create')->with('error', __('content.common.notify_message.error.add'));
        }
    }
}
