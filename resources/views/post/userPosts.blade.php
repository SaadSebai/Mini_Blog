@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 2cm">
        <div class="row">
            <center><h3>User space</h3></center>

            @foreach ($posts as $post)

                <div class="col s12 l6">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ asset('storage'.$post->image) }}" alt="">
                            @if ($post->user->id == auth()->user()->id || auth()->user()->role == 1)
                                <form action="{{ route('post.delete', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="halfway-fab btn-floating pink pulse">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            @endif


                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $post->title }}</span>
                            <span class="new badge red" data-badge-caption="">{{ $post->category }}</span>
                            <p>{{ $post->body }}</p>
                            <br>
                            <p>{{ $post->slug }}</p>
                        </div>
                        <div class="card-action grey lighten-4">
                            @if ($post->user->id == auth()->user()->id || auth()->user()->role == 1)
                                <a href="{{ route('post.edit', $post) }}">edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>



    </div>


@endsection
