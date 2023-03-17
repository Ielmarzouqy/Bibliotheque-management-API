<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


     public function register(){
        

        try{
            request()->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed|min:6'
            ]);

            $user = new User;
            $user->name = request('name');
            $user->email = request('email');
            $user->password =Hash::make(request('password'));
            $user->save();
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        
        return response()->json(['success' => 'account has been created successfully']);
     }


    
  
}
