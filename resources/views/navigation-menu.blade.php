<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="header-left" class="flex items-center">
        <x-application-mark/>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link wire:navigate href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link wire:navigate href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                    {{ __('Blog') }}
                </x-nav-link>
                <x-nav-link wire:navigate href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>
        </div>
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        @include('layouts.partials.header-right-guest')

        @include('layouts.partials.header-right-auth')
    </div>
</nav>
