<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

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
            'username' => ['required', 'unique:users,username', 'min:4', 'max:15'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required','min:8' , 'regex:/^(?=.*[0-9])/'],
            'confirmPassword' => ['required', 'same:password'],
            'gender' => ['required', 'in:male,female,undefined'],
            'dob' => ['required', 'date', 'before:today - 12 years']
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);

        dd('success create user');
    }

    public function forgot_password(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['success' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }



    public function reset_password(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])/',
            'confirmPassword' => ['required', 'same:password'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
