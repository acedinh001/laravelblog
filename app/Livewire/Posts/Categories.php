<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Categories extends Component
{
    #[Computed()]
    public function categories()
    {
        return Category::all();
    }

    public function render()
    {
        return view('livewire.posts.categories');
    }
}
