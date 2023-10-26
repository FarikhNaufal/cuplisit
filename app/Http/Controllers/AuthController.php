<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            'EmailOrUsername' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        $login_type = filter_var($request->input('EmailOrUsername'), FILTER_VALIDATE_EMAIL )
        ? 'email'
        : 'username';
        $request->merge([
            $login_type => $request->input('EmailOrUsername')
        ]);

        if (Auth::attempt($request->only([$login_type, 'password']))) {
            dd("Login success using $login_type");
        }

        dd('Credentials not match');
    }

    public function register(Request $request){
        $request->validate([

        ]);
    }
}
