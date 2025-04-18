<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url]
    public $sort = 'desc';

    #[Url]
    public $search = '';

    #[Url]
    public $category = '';

    #[Computed()]
    public function posts()
    {
        return Post::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('published_at', $this->sort)
            ->when($this->category, function ($query) {
                $query->withCategory($this->category);
            })
            ->published()->paginate(3);
    }

    public function updateSort($sort)
    {
        $this->sort = $sort;
    }

    public function clearFilter()
    {
        $this->search = '';
        $this->category = '';
    }

    public function getSearchCategory()
    {
        return Category::where('slug', $this->category)->first();
    }

    #[On('search-posts')]
    public function updatedSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.posts.post-list');
    }
}
