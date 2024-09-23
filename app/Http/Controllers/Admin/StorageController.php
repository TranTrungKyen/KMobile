<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storage\StorageCreateRequest;
use App\Http\Requests\Storage\StorageUpdateRequest;
use App\Services\Contracts\StorageServiceInterface;
use Illuminate\Support\Facades\Log;

class StorageController extends Controller
{
    protected $storageService;

    public function __construct(StorageServiceInterface $storageService)
    {
        $this->storageService = $storageService;
    }

    public function index()
    {
        $storages = $this->storageService->getAll();

        return view('admin.storage.index', ['storages' => $storages]);
    }

    public function store(StorageCreateRequest $request)
    {
        $notification = [
            'status' => false,
            'redrirectRoute' => route('admin.storage.index'),
            'message' => __('content.common.notify_message.error.add'),
        ];
        try {
            $isSuccess = $this->storageService->store($request);
            if ($isSuccess) {
                $notification = [
                    'status' => true,
                    'redrirectRoute' => route('admin.storage.index'),
                    'message' => __('content.common.notify_message.success.add'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return response()->json($notification);
    }

    public function update(StorageUpdateRequest $request, $id)
    {
        $notification = [
            'status' => false,
            'redrirectRoute' => route('admin.storage.index'),
            'message' => __('content.common.notify_message.error.update'),
        ];
        try {
            $isSuccess = $this->storageService->update($request, $id);
            if ($isSuccess) {
                $notification = [
                    'status' => true,
                    'redrirectRoute' => route('admin.storage.index'),
                    'message' => __('content.common.notify_message.success.update'),
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
            'status' => false,
            'redrirectRoute' => route('admin.storage.index'),
            'message' => __('content.common.notify_message.error.delete'),
        ];
        try {
            $isSuccess = $this->storageService->delete($id);
            if ($isSuccess) {
                $notification = [
                    'status' => true,
                    'redrirectRoute' => route('admin.storage.index'),
                    'message' => __('content.common.notify_message.success.delete'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return response()->json($notification);
    }
}
