@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 2cm">
        <div class="row">

            <center><h4>Create a post</h4></center>

            @if (session('statue'))
                <div class="text-red-500 mt-2 text-bg">
                    {{ session('statue') }}
                </div>
            @endif

            <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data" class="col s10 push-s1">
                @method('PUT')
                @csrf

                <div class="card-panel">

                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $post->title }}">
                        </div>
                    </div>

                    @error('slug')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ $post->slug }}">
                        </div>
                    </div>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="body">Body</label>
                            <textarea name="body" class="materialize-textarea">{{ $post->body }}</textarea>
                        </div>
                    </div>

                    @error('image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="file-field input-field">
                        <div class="btn pink">
                            <span>File</span>
                            <input type="file" name='image'>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <select name="category">
                            <h1><option value="{{ $post->category }}">{{ $post->category }}</option></h1>
                            @foreach ($categories as $category)
                                <h1><option value="{{ $category->name }}">{{ $category->name }}</option></h1>
                            @endforeach
                        </select>
                      </div>

                    <center>
                        <button type="submit" class="btn waves-effect waves-light indigo" >publish
                            <i class="material-icons right">save</i>
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
