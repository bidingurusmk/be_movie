<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Validator;

class MovieController extends Controller
{
    function getMovie() {
        try{
            $Movie = Movie::select('id','title','voteaverage','overview','posterpath')->get();
            return Response()->json([
                'status'=>true,
                'data'=>$Movie,
            ]);
        } catch(Exception $e){
            return Response()->json([
                'status'=>false,
                'data'=>null,
            ]);
        }
    }
    function insertMovie(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'voteaverage' => 'required',
            'overview' => 'required',
            'posterpath' => 'required|max:10000|mimes:jpg,jpeg,png'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $file = request()->posterpath;
        $imageName = time().'-'.$file->getClientOriginalName();
        // $file->store('images', ['disk' => 'public_uploads']);
        $uploadDir    = public_path().'/images';
        $file->move($uploadDir, $imageName);
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->voteaverage = $request->voteaverage;
        $movie->overview = $request->overview;
        $movie->posterpath = $imageName;
        try{   
            $movie->save();
            return Response()->json([
                'status'=>true,
                'message'=>'Sukses input data movie',
            ]);
        } catch(Exception $e){
            return Response()->json([
                'status'=>false,
                'message'=>'Gagal input data movie',
            ]);
        }
    }
}
