<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register (Request $req)
    {
        //validate
        $rules=[
            'name'=>'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string|min:8'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //Users are created in User Table
        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password)
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user'=> $user, 'token'=>$token];
        return response()->json($response,200);
    }

    public function login(Request $req)
    {
        //validate inputs
        $rules =[
            'email' => 'required',
            'password' => 'required|string'
        ];
        $req->validate($rules);

        //finds the email in users table
        $user = User::where('email',$req->email)->first();

        //If User email and Password is found
        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['user'=>$user, 'token'=>$token];
            return response()->json($response, 200);
        }
        $response = ['message'=>'Incorrect Email or Password'];
        return response()->json($response, 400);
    }
}