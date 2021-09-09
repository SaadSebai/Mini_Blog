@auth
    <li><a href="{{ route('post.user', auth()->user()) }}">Posts</a></li>

    @if(auth()->user()->role == 1)
        <li><a href="{{ route('categories') }}">Categories</a></li>
        <li><a href="{{ route('users') }}">Users</a></li>
    @else
        <li><a href="{{ route('post.add') }}">Add Post</a></li>
    @endif
@endauth
@guest
    <li>
        <a href="{{ route('login') }}">Login</a>
    </li>
@endguest
