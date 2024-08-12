<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\AdminUserServiceInterface;
use Illuminate\Http\Request;

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
}
