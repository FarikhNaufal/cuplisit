<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
        // $this->authorizeResource(Post::class, 'posts');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        if ($username === Auth::user()->username) {
            $user = Auth::user();
            return view('users.show', compact('user'));
        }
        $user = User::where('username', $username)->firstOrFail();

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        if ($username != Auth::user()->username) {
            abort(404);
        }
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $username)
    {
        if ($username != Auth::user()->username) {
            abort(404);
        }

        $user = Auth::user();

        $data = $request->validate([
            'username' => ['sometimes', 'unique:users,username,' . $user->id, 'min:4', 'max:15', 'regex:/^[a-zA-Z0-9.-_]+$/'],
            'name' => ['max:45'],
            'gender' => ['sometimes', 'in:male,female,undefined,' . $user->id],
            'bio' => ['max:45'],
            'pob' => ['max:45'],
            'dob' => ['sometimes', 'date', 'before:today - 12 years,' . $user->id],
        ]);

        $data['username'] = strtolower($data['username']);

        if ($request->has('avatar')) {
            if (File::exists(public_path('users/' . $user->id . '/' . $user->avatar))) {
                File::delete(public_path('users/' . $user->id . '/' . $user->avatar));
            }
            $avatar = $request->file('avatar');
            $mediaName = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('users/' . $user->id .'/');
            $avatar->move($path, $mediaName);
            $data['avatar'] = $mediaName;
        }

        $user->update($data);

        return redirect()->route('users.edit', $user->username)->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
