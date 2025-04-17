<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class SearchBar extends Component
{
    public ?string $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search-posts', search: $this->search);
    }

    public function render()
    {
        return view('livewire.posts.search-bar');
    }
}
