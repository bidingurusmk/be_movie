<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    function getMovie() {
        try{
            $Movie = Movie::select('id','title','voteaverage','overview','posterpath')->get();
            return [
                'status'=>true,
                'data'=>$Movie,
            ];
        } catch(Exception $e){
            return [
                'status'=>false,
                'data'=>null,
            ];
        }
        
    }
}
