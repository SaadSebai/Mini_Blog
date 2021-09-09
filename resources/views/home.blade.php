@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 2cm">
        <div class="row">
            <center><h3>Home</h3></center>

            <div class="row">
                <form action="{{ route('post.filter') }}" method="GET">
                    <div class="input-field col s6">
                        <input id="search" name="title" type="text" class="validate">
                        <label class="active" for="search">Search</label>
                    </div>
                </form>

                @if (auth()->user()->role == 1)
                    <a href="{{ route('post.filter.published', 1) }}" class="btn-flat  right">published</a>
                    <a href="{{ route('post.filter.published', 0) }}" class="btn-flat  right">unpublished</a>
                    <a href="#" class="btn-flat  right">Filter by: </a>
                @endif

            </div>

            @foreach ($posts as $post)


                @if ($post->published == 0)
                    @if(auth()->user()->role == 1)
                        @include('post.post')
                    @endif
                @else
                    @include('post.post')
                @endif

            @endforeach

        </div>

        @include('post.postPagination')

    </div>


@endsection
