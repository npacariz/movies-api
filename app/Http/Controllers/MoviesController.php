<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoviesRequest;
use Illuminate\Http\Request;
use App\Movie;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->query('title');
        $take = $request->query('take');
        $skip = $request->query('skip');
       
        if($title) {
            return Movie::where('title', 'LIKE', '%'. $title. '%')->take($take)->get();
        }
        if($take && $skip) {
             return Movie::skip($skip)->take($take)->get();
        }
        return Movie::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoviesRequest $moviesRequest)
    {
        $movie = Movie::create($moviesRequest->all());
        return $movie;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MoviesRequest $moviesRequest, $id)
    {
        $movie = Movie::where('id', $id)->update($moviesRequest->all());
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Movie::destroy($id);
    }
}
