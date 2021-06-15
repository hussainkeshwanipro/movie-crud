<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Movie::paginate(3);
        return view('movies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['Action', 'Comedy', 'Biopic', 'Horror', 'Drama', 'others'];
        return view('movies.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'genre'=>'required',
            'ryear'=>'required',
            'image'=>'required|image|mimes:jpeg, png, jpg, gif|max:2048'
        ]);
        $imageName = '';
        if($request->image)
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move('upload', $imageName);
        }
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->release_data = $request->ryear;
        $movie->poster = $imageName;
        $movie->save();
        return redirect()->route('movies.index')->with('status', 'Movie Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::where('id', $id)->first();
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::where('id', $id)->first();
        $data = ['Action', 'Comedy', 'Biopic', 'Horror', 'Drama', 'others'];
        return view('movies.edit', compact('movie', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $imageName = '';
        if($request->image)
        {
            unlink('upload/'.$movie->poster);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move('upload', $imageName);
            $movie->poster = $imageName;
        }
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->release_data = $request->ryear;
        $movie->save();
        return redirect()->route('movies.index')->with('status', 'Movie Added Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        unlink('upload/'.$movie->poster);
        $movie->delete();
        return redirect()->route('movies.index')->with('status', 'Movie Added Successfully');
      
    }
}
