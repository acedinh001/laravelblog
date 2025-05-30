@props(['post'])
<article {{ $attributes->merge(['class' => '[&:not(:last-child)]:border-b border-gray-100 pb-10']) }}>
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{ route('blog.show', $post->slug) }}" >
                <img class="mw-100 mx-auto rounded-xl"
                     src="{{ $post->getImageUrl() }}"
                     alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <x-post.post-author :author="$post->author"/>
                <span class="text-gray-500 text-xs">{{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('blog.show', $post->slug) }}" >
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-700 font-light">
                {{ $post->excerpt() }}
            </p>
            <div class="mt-5 flex gap-5">
                @if(!empty($post->categories))
                    @foreach($post->categories as $category)
                        <x-badge wire:navigate href="{{ route('blog', ['category' => $category->slug]) }}"
                                 :text_color="$category->text_color" :bg_color="$category->bg_color">{{
                        $category->title
                        }}</x-badge>
                    @endforeach
                @endif
            </div>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-500 text-sm">{{ $post->readTime() }} min read</span>
                </div>
                <div>
                    <livewire:posts.like-btn :post="$post" :key="'like-' . $post->id"/>
                </div>
            </div>
        </div>
    </div>
</article>
