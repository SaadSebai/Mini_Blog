<div class="col s12 l6">
    <div class="card">
        <div class="card-image">
            <img src="{{ asset('storage/'.$post->image) }}" alt=""  style="width:100%; height:300px;">
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
            <span class="new badge indigo lighten-3" data-badge-caption="">{{ $post->category }}</span>
            <p>{{ $post->body }}</p>
            <br>
            <p>{{ $post->slug }}</p>
        </div>
        <div class="card-action grey lighten-4">

            <a href="{{ route('post.user', $post->user) }}">{{ $post->user->username }}</a>

            @if ($post->user->id == auth()->user()->id || auth()->user()->role == 1)
                <a href="{{ route('post.edit', $post) }}">edit</a>
            @endif

            @if (auth()->user()->role == 1)
                @if ($post->published == 0)

                    <form action="{{ route('post.publish', $post) }}" method="POST" class="row" style="margin: 0px">
                        @method('PUT')
                        @csrf
                        <button class="right waves-effect waves-light  btn indigo">publish</button>
                    </form>
                @else
                <form action="{{ route('post.unpublish', $post) }}" method="POST" class="row" style="margin: 0px">
                    @method('PUT')
                    @csrf
                    <button class="right waves-effect waves-light  btn red">unpublish</button>
                </form>
                @endif
            @endif

        </div>
    </div>
</div>
