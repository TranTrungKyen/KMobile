<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Contracts\NewsServiceInterface;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct (NewsServiceInterface $newsService)
    {
        $this->newsService = $newsService;
    }
    
    public function index() 
    {
        return view('user.news');
    }

    public function detail() 
    {
        return view('user.news-detail');
    }
}
