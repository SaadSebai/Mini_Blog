@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 2cm">
        <div class="row">

            @if (session('statue'))
                <div class="text-red-500 mt-2 text-bg">
                    {{ session('statue') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="col s6 push-s3">

                @csrf

                <div class="card-panel">

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="username">User name</label>
                            <input type="text" name="username" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                        </div>
                    </div>

                    <center>
                        <button type="submit" class="btn waves-effect waves-light indigo" >Log-in
                            <i class="material-icons right">login</i>
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
