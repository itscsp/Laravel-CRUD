<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{



    public function register(Request $request) {

            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string|confirmed',
                'role'=> 'required|string',
                'senderEmail' => 'required|string'
            ]);

            $senderUser = User::where('email', $fields['senderEmail'])->first();

            // $name = 'myapptoken';
            // $usertokens = $senderUser->tokens()->where('name', $name)->latest()->first()->plainTextToken;


            if($senderUser['role'] != 'admin'){
                return response([
                    'message' => 'Unauthenticated'
                ], 401);
            }
           


                $user = User::create([
                    'name' => $fields['name'],
                    'email' => $fields['email'],
                    'password' => bcrypt($fields['password']),
                    'role' => $fields['role']
                ]);
                $token = $user->createToken('myapptoken')->plainTextToken;
        
              
                    $response = [
                        'user' => $user,
                        'token' => $token,
                        'senderToken' => $usertokens,
                        'senderEmail' => $senderUser
                    ];
                    
                    return response($response, 201);



    }

    public function login(Request $request) {

        $fields = $request->validate([
            
            'email' => 'required|string',
            'password' => 'required|string|',
            
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;


        $response = [
            'user' => $user,
            'token' => $token
        ];
            
        return response($response, 201);

}

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Loged out'
        ];
    }
}
