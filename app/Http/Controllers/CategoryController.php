<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categorie;
use App\Policies\CategoryPolicy;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth', ['except' => ['login']]);

        $this->categoryService = $categoryService;

    }

    public function index(){

        $this->authorize('create-category');

        $categories = $this->categoryService->index();

        return view('category.categories', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request){

        $name = $request->name;

        return $this->categoryService->store($name);
    }

    public function edit(Categorie $category){

        $this->authorize('update-category');

        $categories = $this->categoryService->index();
        return view('category.updateCategory', [
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Categorie $category){

        $name = $request->name;

        return $this->categoryService->update($name, $category);
    }

    public function destroy(Categorie $category){

        $this->authorize('delete-category');

        return $this->categoryService->destroy($category);
    }
}
