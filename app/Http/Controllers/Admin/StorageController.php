<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\StorageServiceInterface;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    protected $storageService;

    public function __construct(StorageServiceInterface $storageService)
    {
        $this->storageService = $storageService;
    }

    public function index () 
    {   
        $storages = $this->storageService->getAllStorages();
        return view('admin.storage.index', ['storages' => $storages]);
    }
}
