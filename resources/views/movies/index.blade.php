@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="col-md-8">
            <div class="card">

                <div class="card-header"> <b>ALL PRODUCTS</b>
                    <a href="{{ route('movies.create') }}" class="float-right btn btn-primary">Add New Movies</a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Release year</th>
                                <th scope="col">Poster</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th scope="col">{{ $item->id }}</th>
                                <th scope="col">{{ $item->title }}</th>
                                <th scope="col">{{ $item->genre }}</th>
                                <th scope="col">{{ $item->release_data }}</th>
                                <th scope="col"><img src="{{ asset('upload/'.$item->poster) }}" alt="" height="100px">
                                </th>
                                <th scope="col">
                                    <a href="{{ route('movies.show', $item->id) }}" class="btn btn-info">Show</a>
                                    <a href="{{ route('movies.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('movies.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Paku Naki 6 Nay?')"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection