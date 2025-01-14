<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APp\Models\User;

class UserController extends Controller
{
    function GetUser(){
        $User = User::get();
        return Response()->json([
            'user'=>$User
        ]);
    }
}
