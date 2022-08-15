<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request) {
         $fields = $request ->validate([
            'name'=> ['required', 'string'],
            'email'=> ['required', 'string', 'email', 'unique:users,email'],
            'username'=> ['required', 'string', 'unique:users,username'],
            'password'=> ['required', 'string', 'confirmed']
         ]);

         $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'username'=>$fields['username'],
            'password'=>bcrypt($fields['password']),
         ]);

         $token = $user->createToken('myapptoken')->plainTextToken;

         $response = [
            'user'=>$user,
            'token'=>$token
         ];

         return response($response, 201); 
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return[
            'message'=> 'Logged out'
        ];
    }

    public function login(Request $request) {
        $fields = $request ->validate([
           'email'=> ['required', 'string', 'email'],
           'password'=> ['required', 'string']
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message'=> 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
           'user'=>$user,
           'token'=>$token
        ];

        return response($response, 201); 
   }

   public function index() {
      return Auth::user();
   }

   public function user($id) {
      return User::find($id);
  }
   
}
