<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\NewsServiceInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsServiceInterface $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index () 
    {   
        $news = $this->newsService->getAll();
        return view('admin.news.index', ['news' => $news]);
    }
}
