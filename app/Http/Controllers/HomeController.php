<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->middleware('auth', ['except' => ['login']]);

        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->index();

        return view('home', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        $posts = $this->postService->search($request->title);

        return view('home', ['posts' => $posts]);
    }

    public function searchPublished(Request $request)
    {
        $posts = $this->postService->searchPublished($request->published);

        return view('home', ['posts' => $posts]);
    }
}
