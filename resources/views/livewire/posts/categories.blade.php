<div id="recommended-topics-box">
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach($this->categories as $category)
            <x-badge wire:navigate href="{{ route('blog', ['category' => $category->slug]) }}">{{ $category->title
            }}</x-badge>
        @endforeach
    </div>
</div>
