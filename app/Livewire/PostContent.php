<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostContent extends Component
{
    public $post;
    public $content;

    protected $rules = [
        'content' => 'required',
    ];

    public function render()
    {
        return view('livewire.post-content', [
            'comments' => $this->post->comments()->latest()->get(),
            'likes' => $this->post->likes()->count(),
            'dislikes' => $this->post->dislikes()->count(),
            'userHasLiked' => $this->userHasLiked(),
            'userHasDisliked' => $this->userHasDisliked()
        ]);
    }

    public function storeComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => Auth::id(),
            'content' => $this->content,
        ]);

        $this->reset('content');
    }
    public function likeButton()
    {
        if (!$this->userHasLiked()) {
            $this->post->likes()->create([
                'user_id' => Auth::id(),
            ]);
            $this->post->dislikes()->where('user_id', Auth::id())->delete();

        } else {
            $this->post->likes()->where('user_id', Auth::id())->delete();
        }

    }

    public function dislikeButton()
    {
        if (!$this->userHasDisliked()) {
            $this->post->dislikes()->create([
                'user_id' => Auth::id(),
            ]);

            $this->post->likes()->where('user_id', Auth::id())->delete();
        } else {
            $this->post->dislikes()->where('user_id', Auth::id())->delete();
        }

    }

    protected function userHasLiked()
    {
        return $this->post->likes()->where('user_id', Auth::id())->exists();
    }

    protected function userHasDisliked()
    {
        return $this->post->dislikes()->where('user_id', Auth::id())->exists();
    }
}
