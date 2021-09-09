@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 2cm">
        <div class="row">
            <center><h3>Categories</h3></center>

                <form action="{{ route('categories.create') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" required>
                        </div>
                    </div>

                    <button class="waves-effect waves-light btn-small indigo" style="margin-bottom: 0.5cm">
                        <span>Create Category</span>
                    </button>
                </form>

                <table class="centered">
                    <thead>
                        <th>Name</th>
                        <th>Last modification</th>
                        <th>edit</th>
                        <th>delete</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category) }}" class="waves-effect waves-light btn-small orange">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.delete', $category) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="waves-effect waves-light btn-small red">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>



    </div>


@endsection
