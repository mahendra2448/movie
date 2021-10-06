<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\People;
use App\Models\Theatre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $movies  = Movie::get();
        
        $allMovie = [];
        
        foreach ($movies as $mov) {
            $directors  = People::where('director',$mov->movie_id)->get();
            $actors     = People::where('actors',$mov->movie_id)->get();
            $theatre    = Theatre::select('theatre_name','tanggal','play_time')->where('movie',$mov->movie_id)->get();

            $starring   = [];
            $director   = [];
            $cinema     = [];

            foreach ($actors as $actor) {
                $a = $actor->pname;
                array_push($starring, $a);
            }
            foreach ($directors as $dir) {
                $d = $dir->pname;
                array_push($director, $d);
            }
            foreach ($theatre as $cin) {
                $c = [
                    'audi' => $cin->theatre_name,
                    'date' => $cin->tanggal,
                    'time' => $cin->play_time    
                ];
                array_push($cinema, $c);
            }
            $movie = [
                'movieID'   => $mov->movie_id,
                'title'     => $mov->title,
                'synopsis'  => $mov->synopsis,
                'genre'     => $mov->genre,
                'duration'  => $mov->duration,
                'age'       => $mov->age,
                'cover'     => $mov->cover,
                'director'  => $starring,
                'actors'    => $director,
                'play_at'   => $cinema
            ];

            array_push($allMovie, $movie);
        };

        return view('index',['movies'=>$allMovie]);
    }

    public function indexAPI() {

        $movies  = Movie::get();
        
        $allMovie = [];
        
        foreach ($movies as $mov) {
            $directors  = People::where('director',$mov->movie_id)->get();
            $actors     = People::where('actors',$mov->movie_id)->get();
            $theatre    = Theatre::select('theatre_name','tanggal','play_time')->where('movie',$mov->movie_id)->get();

            $starring   = [];
            $director   = [];
            $cinema     = [];

            foreach ($actors as $actor) {
                $a = $actor->pname;
                array_push($starring, $a);
            }
            foreach ($directors as $dir) {
                $d = $dir->pname;
                array_push($director, $d);
            }
            foreach ($theatre as $cin) {
                $c = [
                    'audi' => $cin->theatre_name,
                    'date' => $cin->tanggal,
                    'time' => $cin->play_time    
                ];
                array_push($cinema, $c);
            }
            $movie = [
                'movieID'   => $mov->movie_id,
                'title'     => $mov->title,
                'synopsis'  => $mov->synopsis,
                'genre'     => $mov->genre,
                'duration'  => $mov->duration,
                'age'       => $mov->age,
                'cover'     => $mov->cover,
                'director'  => $starring,
                'actors'    => $director,
                'play_at'   => $cinema
            ];

            array_push($allMovie, $movie);
        };


        return $allMovie;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'movie_id',
            'title',
            'synopsis',
            'duration',
            'genre',
            'age'
        ]);

        return Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::find($id);
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
        $movie->update($request->all());
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

     /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Movie::where('name', 'like', '%'.$name.'%')->get();
    }
}
