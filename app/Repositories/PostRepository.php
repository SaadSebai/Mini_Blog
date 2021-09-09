<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository{

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index(){
        return Post::latest()->paginate(6);
    }

    public function search($title){
        return Post::latest()->where('title', 'LIKE', '%'. $title .'%')->paginate(6);
    }

    public function searchPublished($published){
        return Post::latest()->where('published', $published)->paginate(6);
    }

    public function findByCategory($category){
        return Post::where('category', $category)->get();
    }

    public function store($data){
        Post::create($data);
    }

    public function update($data, $post){
        $post->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'body' => $data['body'],
            'image' => $data['image'],
            'category' => $data['category']
        ]);
    }

    public function updateCategory($cate, Post $post){
        $post->update([
            'category' => $cate
        ]);
    }

    public function publish(Post $post){
        $post->update([
            'published' => 1
        ]);
    }

    public function unpublish(Post $post){
        $post->update([
            'published' => 0
        ]);
    }

    public function destroy(Post $post){
        $post->delete();
    }
}
