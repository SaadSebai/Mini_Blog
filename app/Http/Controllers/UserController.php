<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('username', 'password'), $request->remember)){
            return back()->with('statue', 'Invalid login details');
        }

        return redirect()->route('home');
    }

    public function index()
    {
        $this->authorize('index-user');

        $users = $this->userService->index();

        return view('usersList', ['users' => $users]);
    }

    public function block(Request $request , User $user)
    {
        $this->authorize('block-user');

        $this->userService->block($user, $request->block);

        return back();
    }
}
