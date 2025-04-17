<div id="posts" class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
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
