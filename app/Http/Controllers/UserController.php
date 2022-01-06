<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function findUserById($id){
        $user = User::find($id);

        return response()->json([
            'status'=>'200',
            'success'=>true,
            'data'=>$user
        ]);

    }
}
