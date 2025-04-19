<?php

namespace App\Livewire\Posts;

use Livewire\Attributes\Computed;
use Livewire\Component;

class PostComment extends Component
{

    public $post;

    public $comment;

    public function postComment()
    {
        $this->post->comments()->create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'content' => $this->comment,
        ]);
    }

    #[Computed]
    public function comments()
    {
        return $this->post->comments()->latest()->paginate(3);
    }

    public function render()
    {
        return view('livewire.posts.post-comment');
    }
}
