<?php

namespace App\Livewire;

use App\Models\Follower;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;


    public function render()
    {
        $followers = Follower::where('user_id', $this->user->id)->latest()->get('follower_id');
        $following = Follower::where('follower_id', $this->user->id)->latest()->get();
        $userHasFollowed = $this->userHasFollowed();

        return view('livewire.profile', compact('followers', 'following', 'userHasFollowed'));
    }

    public function followButton()
    {
        if ($this->userHasFollowed()) {
            Follower::where('user_id', $this->user->id)
                ->where('follower_id', Auth::id())
                ->delete();
        } else {
            Follower::create([
                'user_id' => $this->user->id,
                'follower_id' => Auth::id(),
            ]);
        }
    }

    public function unfollowButton($follower_id){
        Follower::where('follower_id', $this->user->id)->where('user_id', $follower_id)->delete();
    }

    public function removeFollower($following_id){
        Follower::where(['user_id'=> Auth::id(), 'follower_id' => $following_id])->delete();
    }

    public function userHasFollowed(){
        return Auth::user()->following()
        ->where('user_id', $this->user->id)
        ->exists();
    }
}
