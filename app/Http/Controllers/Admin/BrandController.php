<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandCreateRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Services\Contracts\BrandServiceInterface;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandServiceInterface $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->getAll();

        return view('admin.brand.index', ['brands' => $brands]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandCreateRequest $request)
    {
        try {
            $this->brandService->store($request);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return redirect()->route('admin.brand.create')->with('error', __('content.common.notify_message.error.add'));
        }

        return redirect()->route('admin.brand.index')->with('success', __('content.common.notify_message.success.add'));
    }

    public function edit($id)
    {
        try {
            $brand = $this->brandService->getBrand($id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return redirect()->route('admin.brand.index')->with('error', 'Truy cập thất bại');
        }

        return view('admin.brand.edit', ['brand' => $brand]);
    }

    public function update(BrandUpdateRequest $request, $id)
    {
        try {
            $this->brandService->update($request, $id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return redirect()->route('admin.brand.edit', ['id' => $id])->with('error', __('content.common.notify_message.error.update'));
        }

        return redirect()->route('admin.brand.index')->with('success', __('content.common.notify_message.success.update'));
    }

    public function delete($id)
    {
        try {
            $this->brandService->delete($id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return redirect()->route('admin.brand.index')->with('error', __('content.common.notify_message.error.delete'));
        }

        return redirect()->route('admin.brand.index')->with('success', __('content.common.notify_message.success.delete'));
    }
}
