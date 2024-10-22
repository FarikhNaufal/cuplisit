<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
        // $this->authorizeResource(Post::class, 'posts');
    }


    public function index()
    {
        $followingId = Auth::user()->following()->pluck('user_id')->toArray();
        $followingId[] = Auth::id();
        $posts = Post::whereIn('user_id', $followingId)
            ->with(['comments' => function ($comments) {
                $comments->latest();
        }])->latest()->get();

        $recommendationUsers = User::whereNotIn('id', $followingId)
            ->where('id', '<>', Auth::id())
            ->limit(10)
            ->select('id','username', 'avatar', 'bio')
            ->get();

        $followedUsers = User::whereIn('id', $followingId)->where('id', '<>', Auth::id())->select('id','username', 'avatar', 'bio')->get();
        return view('posts.index', compact('posts', 'recommendationUsers', 'followedUsers'));
    }

    public function explore(){
        $followingId = Auth::user()->following()->pluck('user_id')->toArray();
        $followingId[] = Auth::id();
        $posts = Post::with(['comments' => function ($comments) {
            $comments->latest();
        }])
        ->latest()
        ->get();
        $recommendationUsers = User::whereNotIn('id', $followingId)
            ->where('id', '<>', Auth::id())
            ->limit(10)
            ->select('id','username', 'avatar', 'bio')
            ->get();

        $followedUsers = User::whereIn('id', $followingId)->where('id', '<>', Auth::id())->select('id','username', 'avatar', 'bio')->get();
        return view('posts.explore', compact('posts', 'recommendationUsers', 'followedUsers'));
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
        $data = $request->validate([
            'media' => ['sometimes', 'required_without:caption', 'max:10240',
            'mimetypes:image/*,video/*',
            // 'mimetypes:image/jpeg,image/jpg,image/png,image/jfif,image/heic,video/mp4,video/quicktime,video/MP4', // Allowed photo and video formats
            // 'dimensions:min_width=32,min_height=32'
        ],
            'caption' => ['sometimes', 'max:150', 'required_without:media'],
        ]);


        if ($request->has('media')) {
            $media = $request->file('media');
            $mediaName = time() . '.' . $media->getClientOriginalExtension();
            $path = public_path("users/" . $this->user->id . "/posts/");
            $media->move($path, $mediaName);
            $data['media'] = $mediaName;
        }

        $data['user_id'] = $this->user->id;


        Post::create($data);

        return redirect('/')->with('success', 'Post created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        //are project media updateable?

        $data = $request->validate([
            'media' => ['sometimes','required', 'mimes:png,jpg,mp4', 'size:10240'],
            'caption' => ['sometimes','required', 'max:100'],
        ]);

        if ($request->has('media')) {
            $mediaPath = public_path('users/' . $this->user->id . '/posts/' . $post['media']);
            if (File::exists($mediaPath)) {
                File::delete($mediaPath);
            }
            $media = $request->file('media');
            $mediaName = time() . '.' . $media->getClientOriginalExtension();
            $path = public_path('users/'. $this->user->id .'/posts/');
            $media->move($path, $mediaName);
        }


        $post->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $media =  public_path('users/' . $this->user->id . '/posts/' . $post['media']);
        if (File::exists($media)) {
            File::delete($media);
        }
        File::delete($media);
        $post->delete();

        return redirect()->back();
    }

    public function report(Post $post){
        $report = new Report();
        $post->report()->save($report);

        return redirect()->back()->with('success', 'Post reported successfully.');
    }
}
