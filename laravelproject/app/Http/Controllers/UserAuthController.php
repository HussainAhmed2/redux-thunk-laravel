<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAuthController extends Controller
{
    public function Login(Request $res){
        $user= User::where('email', $res->email)->first();
        if(!$user || !Hash::chack($res->password,$user->password)){
            return json_encode([
                "message" => "invalid email and password"
            ],404);
        }
            $token = $user->createToken('my-app-token')->plainTextToken;
            return json_encode([
                "user" => $user,
                "token" => $token
            ]);
        

    }

}    
