<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;




class CatalogController extends Controller
{
    //


   
    
    public function getIndex(){
        $movies = Movie::all();
        return view('catalog.index', ['arrayPeliculas' => $movies]);
    }

    public function getShow($id){
    
        $movie = Movie::findOrFail($id + 1);
        return view('catalog.show', ['id' => $movie]);
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        $movie = Movie::findOrFail($id); 
        return view('catalog.edit', ['pelicula' => $movie]);
    }

    public function postCreate(Request $request){
        
        $validatedData = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'director' => 'required',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);


        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->rented = false;
        $movie->save();

        return redirect()->action('CatalogController@getIndex');


    }

    public function putEdit($id, Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'director' => 'required',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);

        $movie = Movie::find($id);

        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();

        return redirect()->action('CatalogController@getIndex');

    }

    public function alquilar($id, Request $request){


        $movie = Movie::find($id);

        if($movie->rented){
            $movie->rented = false;
        }else{
            $movie->rented = true;
        }

        $movie->save();

        return redirect()->action('CatalogController@getIndex');

    }


}
