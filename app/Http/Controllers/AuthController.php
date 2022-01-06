<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request){
        $field = $request->validate([
            'name'=>'required|string',
            'last_name'=>'required|string',
            'cellphone'=>'required|string',
            'email'=>'required|unique:users,email',
            'password'=>'required|string|confirmed',
            // 'image'=>'image|mimes:jpg,png,jpeg,jpg',
            'rol'=>'required|string',
        ]);

          

        $user = User::create([
            'name'=>$field['name'],
            'last_name'=>$field['last_name'],
            'cellphone'=>$field['cellphone'],
            'email'=>$field['email'],
            'password'=>bcrypt($field['password']),
            // 'image'=>$field['image'],
            'rol'=>$field['rol'],
        ]);

        $token = $user->createToken('Auth')->plainTextToken;

        

        return response()->json([
            'status'=>200,
            'success'=>true,
            'data'=>$user,
            'token'=>$token
        ]);
    }


    function login(Request $request){
        $field = $request->validate([
           
            'email'=>'required|email',
            'password'=>'required|string',
           
        ]);

        // check email

        $user = User::where('email',$field['email'])->first();

        //check Password

        if(!$user || !Hash::check($field['password'],$user->password)) {
            return response()->json([
                'messagge:'=>'Bad credentials',
                'success'=>'false',
                
            ],401);
        };
        $token = $user->createToken('Auth')->plainTextToken;

        

        return response()->json([
            'status'=>'200',
            'success'=>true,
            'data'=>$user,
            'token'=>$token
        ]);
    }

    function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response()->json([
            'messagge:'=>'Logged out'
        ]);
    }
}
