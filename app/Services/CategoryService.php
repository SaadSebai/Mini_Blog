<?php

namespace App\Services;

use App\Models\Categorie;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class CategoryService{

    private $categoryRepository;
    private $postRepository;

    public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function index(){
        return $this->categoryRepository->index();
    }

    public function store($name){

        $uuid = (string) Str::uuid();

        $this->categoryRepository->store($name, $uuid);

        return redirect()->route('categories');
    }

    public function update($name, Categorie $category){

        $posts = $this->postRepository->findbyCategory($category->name);

        $cate = $name;

        foreach($posts as $post){
            $this->postRepository->updateCategory($cate, $post);
        }

        $this->categoryRepository->update($name, $category);

        return redirect()->route('categories');
    }

    public function destroy(Categorie $category){

        $this->categoryRepository->destroy($category);

        $posts = $this->postRepository->findbyCategory($category->name);

        $cate = 'uncategorized';

        foreach($posts as $post){
            $this->postRepository->updateCategory($cate, $post);
        }

        return redirect()->route('categories');
    }
}
