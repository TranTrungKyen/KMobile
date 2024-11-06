<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ChatGPTServiceInterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected $chatGPTService;

    public function __construct(ChatGPTServiceInterface $chatGPTService)
    {
        $this->chatGPTService = $chatGPTService;
    }

    public function index ()
    {
        return view('layouts.chat');
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $response = $this->chatGPTService->getResponse($request->message);

        return response()->json(['response' => $response]);
    }
}
