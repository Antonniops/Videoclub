<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    

    public function getHome(){
        return redirect()->action('CatalogController@getIndex');
    }

    public function index(){
        return redirect()->action('CatalogController@getIndex');
    }

    
}
