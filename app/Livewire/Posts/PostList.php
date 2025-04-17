<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url]
    public $sort = 'desc';

    #[Computed()]
    public function posts()
    {
        return Post::query()->orderBy('published_at', $this->sort)->published()->paginate(3);
    }

    public function updateSort($sort)
    {
        $this->sort = $sort;
    }

    public function render()
    {
        return view('livewire.posts.post-list');
    }
}
