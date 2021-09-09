<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->role === 0;

    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->role === 1;

    }

    public function publish(User $user)
    {
        return $user->role === 1;

    }

    public function unpublish(User $user)
    {
        return $user->role === 1;

    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->role === 1;
    }
}
