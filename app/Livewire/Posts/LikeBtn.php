<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class LikeBtn extends Component
{
    #[Reactive]
    public Post $post;

    public function toggleLike()
    {
        if (!Auth::check()) {
            return $this->redirect('/login', navigate: true);
        }

        $hasLiked = $this->post->hasLiked();

        if ($hasLiked) {
            return $this->post->likes()->detach(Auth::id());
        }
        return $this->post->likes()->attach(Auth::id());
    }

    public function render()
    {
        return view('livewire.posts.like-btn');
    }
}
