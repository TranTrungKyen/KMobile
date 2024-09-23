<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\ColorCreateRequest;
use App\Http\Requests\Color\ColorUpdateRequest;
use App\Services\Contracts\ColorServiceInterface;
use Illuminate\Support\Facades\Log;

class ColorController extends Controller
{
    protected $colorService;

    public function __construct(ColorServiceInterface $colorService)
    {
        $this->colorService = $colorService;
    }

    public function index()
    {
        $colors = $this->colorService->getAll();

        return view('admin.color.index', ['colors' => $colors]);
    }

    public function store(ColorCreateRequest $request)
    {
        $notification = [
            'status' => false,
            'redrirectRoute' => route('admin.color.index'),
            'message' => __('content.common.notify_message.error.add'),
        ];
        try {
            $isSuccess = $this->colorService->store($request);
            if ($isSuccess) {
                $notification = [
                    'status' => true,
                    'redrirectRoute' => route('admin.color.index'),
                    'message' => __('content.common.notify_message.success.add'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return response()->json($notification);
    }

    public function update(ColorUpdateRequest $request, $id)
    {
        try {
            $this->colorService->update($request, $id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return redirect()->route('admin.color.edit', ['id' => $id])->with('error', __('content.common.notify_message.error.update'));
        }

        return redirect()->route('admin.color.index')->with('success', __('content.common.notify_message.success.update'));
    }

    public function edit($id)
    {
        $color = $this->colorService->find($id);

        return view('admin.color.edit', ['color' => $color]);
    }

    public function delete($id)
    {
        $notification = [
            'status' => false,
            'redrirectRoute' => route('admin.color.index'),
            'message' => __('content.common.notify_message.error.delete'),
        ];
        try {
            $isSuccess = $this->colorService->delete($id);
            if ($isSuccess) {
                $notification = [
                    'status' => true,
                    'redrirectRoute' => route('admin.color.index'),
                    'message' => __('content.common.notify_message.success.delete'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return response()->json($notification);
    }
}
