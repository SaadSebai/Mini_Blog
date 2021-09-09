<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(){
        return $this->postRepository->index();
    }

    public function search($title){
        return $this->postRepository->search($title);
    }

    public function searchPublished($published){
        return $this->postRepository->searchPublished($published);
    }

    public function store($data){

        $data['uuid'] = (string) Str::uuid();
        $data['user_id'] = auth()->user()->id;

        $data['image'] = $data['image']->store('image');

        $this->postRepository->store($data);

        return redirect()->route('home');
    }

    public function update($data, $post){

        if(array_key_exists('image', $data))
            $data['image'] = $data['image']->store('image');
        else
            $data['image'] = $post->image;

        $this->postRepository->update($data, $post);

        return redirect()->route('home');
    }

    public function publish(Post $post){

        $this->postRepository->publish($post);
        return back();
    }

    public function unpublish(Post $post){

        $this->postRepository->unpublish($post);
        return back();
    }

    public function destroy(Post $post){

        $this->postRepository->destroy($post);
        return back();
    }


}
