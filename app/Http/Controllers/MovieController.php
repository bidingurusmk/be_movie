<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Validator;
use Illuminate\Support\Facades\URL;

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
    function insertMovie(Request $request,$id=null) {
        if($id==null){
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'voteaverage' => 'required',
                'overview' => 'required',
                'posterpath' => 'required|max:10000|mimes:jpg,jpeg,png'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'voteaverage' => 'required',
                'overview' => 'required',
            ]);
        }
        
        if ($validator->fails()) {
            return $validator->errors();
        }
        
        try{  
            if($id==null){
                $movie = new Movie();
            } else {
                $movie = Movie::find($id);
            }
            $file = request()->posterpath;
            if($file==''||$file==null){
            } else {
                $imageName = time().'-'.$file->getClientOriginalName();
                // $file->store('images', ['disk' => 'public_uploads']);
                $uploadDir    = public_path().'/images';
                $file->move($uploadDir, $imageName);
                $movie->posterpath = URL('/').'/images/'.$imageName;
            }
            
            $movie->title = $request->title;
            $movie->voteaverage = $request->voteaverage;
            $movie->overview = $request->overview;
         
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
    function hapusMovie($id) {
        try{
            Movie::where('id',$id)->delete();
            return Response()->json([
                'status'=>true,
                'message'=>'Sukses hapus data movie',
            ]);
        }catch(Exception $e){
            return Response()->json([
                'status'=>false,
                'message'=>'Gagal hapus data movie',
            ]);
        }
        
    }
}
