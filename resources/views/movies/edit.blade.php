@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Edit Movie Form</b></div>
                <div class="card-body">
                    <form action="{{ route('movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label>Movie Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $movie->title }}">
                        </div>
                        <div>
                            <label>Genre</label>
                            <select name="genre" id="genre" class="form-control">
                                <option value="">Select genre</option>
                                @if ($movie->genre)
                                <option value="{{ $movie->genre }}" selected>{{ $movie->genre }}</option>
                                @foreach ($data as $item)
                                <option value="{{ $item }}">{{ $item }}</option>  
                                @endforeach  
                                @endif
                            </select>
                        </div>
                        <div>
                            <label>Release Year</label>
                            <input type="text" name="ryear" id="ryear" class="form-control" value="{{ $movie->release_data }}">
                        </div>
                        <div class="form-group">
                            <label>Movie Poster</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <input type="submit" class="btn btn-dark">
                        <a href="{{ route('movies.index') }}" class="float-right btn btn-success">Home</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection