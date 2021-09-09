<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class PostController extends Controller
{

    private $postService;
    private $categoryService;

    public function __construct(PostService $postService, CategoryService $categoryService)
    {
        $this->middleware('auth', ['except' => ['login']]);

        $this->postService = $postService;

        $this->categoryService = $categoryService;

    }

    public function userPosts(User $user){

        $posts = $user->posts;
        return view('post.userPosts', ['posts' => $posts]);

    }

    public function add()
    {
        $this->authorize('create-post');

        $categories = $this->categoryService->index();
        return view('post.createPost', ['categories' => $categories]);
    }

    public function store(PostRequest $request)
    {
        $data = $request->only([
            'title',
            'slug',
            'body',
            'image',
            'category'
        ]);

        return $this->postService->store($data);

    }

    public function edit(Post $post){

        $this->authorize('update-post', $post);

        $categories = $this->categoryService->index();

        return view('post.editPost', ['categories' => $categories, 'post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->only([
            'title',
            'slug',
            'body',
            'image',
            'category'
        ]);

        return $this->postService->update($data, $post);

    }

    public function publish(Post $post){

        $this->authorize('publish-post');

        return $this->postService->publish($post);
    }

    public function unpublish(Post $post){

        $this->authorize('unpublish-post');

        return $this->postService->unpublish($post);
    }

    public function destroy(Post $post){

        $this->authorize('delete-post', $post);

        return $this->postService->destroy($post);
    }

}
