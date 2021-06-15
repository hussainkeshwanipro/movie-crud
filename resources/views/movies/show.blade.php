@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Show Movie</b></div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        
                        <div>
                            <label>Movie Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                disabled value="{{ $movie->title }}">
                        </div>
                        <div>
                            <label>Genre</label>
                            <input  class="form-control"
                                disabled value="{{ $movie->genre }}">
                        </div>
                        <div>
                            <label>Release Year</label>
                            <input type="text" value="{{ $movie->release_data }}" name="ryear" id="ryear" class="form-control" disabled>
                        </div>{{ $movie->poster }}
                        <div class="form-group">
                            <label>Movie Poster</label>
                             <img src="{{ asset('upload/'.$movie->poster) }}" alt="{{ $movie->poster }}" height="100px" width="100px">
                                                    
                        </div>
                        <a href="{{ route('movies.index') }}" class="btn btn-success">Home</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection