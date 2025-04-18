<div  class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div>
            @if($this->category or $this->search)
                <button wire:click="clearFilter" class="mr-5 text-gray-500">x</button>
            @endif
            @php
                $category = $this->getSearchCategory()
            @endphp
            @if ($category)
                <x-badge wire:navigate href="{{ route('blog', ['category' => $category->slug]) }}"
                         :text_color="$category->text_color" :bg_color="$category->bg_color">{{
                    $category->title
                    }}</x-badge>
            @endif
            @if ($this->search)
                <span class="ml-3">Searching {{ $this->search }}</span>
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button wire:click="updateSort('asc')" class="{{ $sort === 'asc' ?  'text-gray-900 py-4 border-b
            border-gray-700' : 'text-gray-500'}} py-4">Latest</button>
            <button wire:click="updateSort('desc')" class="{{ $sort === 'desc' ?  'text-gray-900 py-4 border-b
            border-gray-700' : 'text-gray-500'}} py-4">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach($this->posts as $post)
            <x-post.post-item :post="$post"/>
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links(data: ['scrollTo' => false]) }}
    </div>
</div>
