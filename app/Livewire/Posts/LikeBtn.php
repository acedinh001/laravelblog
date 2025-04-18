<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeBtn extends Component
{
    public Post $post;

    public function toggleLike()
    {
        if (!Auth::check()) {
            return $this->redirect('/login', navigate: true);
        }
        $hasLiked = $this->post->likes()->where('user_id', Auth::id())->exists();

        if ($hasLiked) {
            $this->post->likes()->detach(Auth::id());
        }
        $this->post->likes()->attach(Auth::id());
    }

    public function render()
    {
        return view('livewire.posts.like-btn');
    }
}
