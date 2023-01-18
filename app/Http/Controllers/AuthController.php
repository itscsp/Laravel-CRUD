<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request) {

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|confirmed',
            'role'=> 'required|string',
        ]);
        
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role' => $fields['role']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

      
            $response = [
                'user' => $user,
                'token' => $token
            ];
            
            return response($response, 201);
        


    }
}
