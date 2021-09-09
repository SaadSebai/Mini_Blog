<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository{

    public function index(){
        return User::where('role', 0)->get();
    }

    public function block(User $user, $block){
        $user->update([
            'blocked' => $block
        ]);
    }
}
