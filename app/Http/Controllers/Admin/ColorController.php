<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ColorServiceInterface;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $colorService;

    public function __construct(ColorServiceInterface $colorService)
    {
        $this->colorService = $colorService;
    }

    public function index () 
    {   
        $colors = $this->colorService->getAll();
        return view('admin.color.index', ['colors' => $colors]);
    }
}
