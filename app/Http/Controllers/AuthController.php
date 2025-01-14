<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|unique:users',
            'role'=>'required',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
		}
 
        $data = [
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),
            'role'=>$request->get('role'),
        ];

        try {
            $insert = User::create($data);
            return Response()->json(["status"=>true,'message'=>'Data berhasil ditambahkan']);

        } catch (Exception $e) {
            return Response()->json(["status"=>false,'message'=>$e]);
        }
    }
    function login(Request $request) {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->guard('api')->setTTL(120)->attempt($credentials)) {
            return Response()->json([
                'message'=>'Anda gagal login, email dan password salah.',
                'status'=>false,
            ]);
        }
        $data['status']=true;
        $data["token"] = $token;
        $user = User::where("email", request("email"))->first();
        $data['message']='Anda berhasil login';
        $data["user"] = [
            "id" => $user->id,
            "nama_user" => $user->name,
            "email" => $user->email,
            'role' => $user->role,
        ];

        return Response()->json($data);
    }
}
