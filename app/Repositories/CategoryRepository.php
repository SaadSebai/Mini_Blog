<?php

namespace App\Repositories;

use App\Models\Categorie;

class categoryRepository{

    public function __construct(Categorie $category){
        $this->category = $category;
    }

    public function index(){
        return Categorie::all();
    }

    public function store($name, $uuid){

        Categorie::create([
            'uuid' => $uuid,
            'name' => $name
        ]);

    }

    public function update($name, Categorie $category){
        $category->update([
            'name' => $name
        ]);
    }

    public function destroy(Categorie $category){
        $category->delete();
    }
}
