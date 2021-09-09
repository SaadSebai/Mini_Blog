@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 2cm">
        <div class="row">
            <center><h3>Categories</h3></center>

                <table class="centered">
                    <thead>
                        <th>Name</th>
                        <th>active</th>
                        <th>posts</th>
                        <th>block</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @if($user->blocked)
                                        blocked
                                    @else
                                        active
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('post.user', $user) }}" class="waves-effect waves-light btn-small orange">Posts</a>
                                </td>
                                <td>

                                    <form action="{{ route('users.block', $user) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        @if ($user->blocked == 0)
                                            <input type="text" name="block" value="1" hidden>
                                            <button class="waves-effect waves-light btn-small red">
                                                <i class="material-icons">block</i>
                                            </button>
                                        @else
                                            <input type="text" name="block" value="0" hidden>
                                            <button class="waves-effect waves-light btn-small blue">
                                                <i class="material-icons">check</i>
                                            </button>
                                        @endif
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>



    </div>


@endsection
