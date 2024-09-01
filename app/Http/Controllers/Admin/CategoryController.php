<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index () 
    {   
        $categories = $this->categoryService->getAll();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function update(CategoryUpdateRequest $request, $id) 
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('admin.category.index'),
            "message" => __('content.common.notify_message.error.update'),
        ];
        try {
            $isSuccess = $this->categoryService->update($request, $id);
            if($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('admin.category.index'),
                    "message" => __('content.common.notify_message.success.update'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function store(CategoryCreateRequest $request) 
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('admin.category.index'),
            "message" => __('content.common.notify_message.error.add'),
        ];
        try {
            $isSuccess = $this->categoryService->store($request);
            if($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('admin.category.index'),
                    "message" => __('content.common.notify_message.success.add'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function delete($id) 
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('admin.category.index'),
            "message" => __('content.common.notify_message.error.add'),
        ];
        try {
            $isSuccess = $this->categoryService->delete($id);
            if($isSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => route('admin.category.index'),
                    "message" => __('content.common.notify_message.success.add'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }
}
