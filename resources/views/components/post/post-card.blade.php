@props(['post'])

<a href="http://127.0.0.1:8000/blog/laravel-34">
    <div>
        <img class="w-full rounded-xl"
             src="{{ $post->getImageUrl() }}">
    </div>
</a>
<div class="mt-3">
    <div class="flex items-center mb-2 justify-between">
        @php
            $category = $post->categories->first();
        @endphp
        @if(!empty($category))
            <x-badge wire:navigate :text_color="$category->text_color" :bg_color="$category->bg_color" href="{{ route
            ('blog',
            ['category' =>
            $category->slug]) }}">{{
            $category->title
            }}</x-badge>
        @endif
        <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
    </div>
    <a class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
</div>
