<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){
        return $this->userRepository->index();
    }

    public function block(User $user, $block){
        return $this->userRepository->block($user, $block);
    }
}
