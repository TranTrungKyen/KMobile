<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\NewsServiceInterface;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsServiceInterface $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        $news = $this->newsService->getAll();

        return view('admin.news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store()
    {
        return view('admin.news.create');
    }
}
