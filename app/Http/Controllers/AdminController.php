<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function report(){
        $reports = Post::withCount('report')->has('report')->get();

        return view('admin.posts.index', compact('reports'));
    }


    public function login(Request $request){
        $request->validate([
            'EmailOrUsername' => ['required', 'min:4'],
            'password' => ['required', 'min:8']
        ]);

        $login_type = filter_var($request->input('EmailOrUsername'), FILTER_VALIDATE_EMAIL )
        ? 'email'
        : 'username';

        $request->merge([
            $login_type => $request->input('EmailOrUsername')
        ]);

        $remember_me = $request->has('rememberme') ? true : false;

        if (Auth::guard('admin')->attempt($request->only([$login_type, 'password']), $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        } else {
            return redirect()->back()->withInput()->with('loginerror', 'Wrong credentials.');
        }
    }

    public function deletePost(String $userID, Post $post) {
        $media =  public_path('users/' . $userID . '/posts/' . $post['media']);
        if (File::exists($media)) {
            File::delete($media);
        }
        File::delete($media);
        $post->delete();

        return redirect()->back();
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }
}
