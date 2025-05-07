@extends('layout.base')

@section('body')
    <div id="app" x-data="{ sidebar_is_open: true }" data-role="layout-page" class="flex w-full h-screen overflow-hidden">
        <aside class="flex flex-col h-full overflow-hidden transition-all border-r-2 border-b-gray-200"
            x-bind:class="sidebar_is_open ? 'w-80' : 'w-0'">
            <h1 id="logo"
                class="flex items-center justify-center w-full h-16 cursor-default select-none space-x-1 mt-1">
                <img src="{{ asset('image/dx.png') }}" alt="DXTrack Logo" class="h-8 object-contain">
                <span class="text-3xl mt-1  text-orange-600 ">track</span>
            </h1>
        
            <section class="flex flex-col items-center justify-start w-full gap-4 overflow-x-hidden overflow-y-auto mt-8 px-4 sm:px-6">
                <!-- Menu Section -->
                <div id="menu" class="flex flex-col items-start justify-start w-full space-y-4">
                    <!-- Setting Menu Item -->
                    <a data-role="menu-item" href="{{ route('setting') }}"
                        class="flex items-center justify-start w-full gap-3 px-6 py-3 text-sm text-blue-950 cursor-pointer select-none rounded-lg transition duration-200 ease-in-out 
                        {{ Route::currentRouteName() == 'setting' ? 'bg-gray-200' : 'hover:bg-blue-950 hover:text-white hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' }}">
                        <x-fas-gear class="w-6 h-6" />
                        <p class="text-lg font-medium">Setting</p>
                    </a>
            
                    <!-- Team Menu Item -->
                    <a data-role="menu-item" href="{{ route('home') }}"
                        class="flex items-center justify-start w-full gap-3 px-6 py-3 text-sm text-blue-950 cursor-pointer select-none rounded-lg transition duration-200 ease-in-out 
                        {{ Route::currentRouteName() == 'home' ? 'bg-gray-200' : 'hover:bg-blue-950 hover:text-white hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' }}">
                        <x-fas-cube class="w-6 h-6" />
                        <p class="text-lg font-medium">Team</p>
                    </a>
                </div>
            
                <!-- Conditional Section (App Side) -->
                @hasSection('app-side')
                    <div class="flex-grow w-full mt-6">
                        @yield('app-side')
                    </div>
                @endif
            </section>
            
        </aside>

        <div class="flex flex-col items-center content-center flex-1 h-full overflow-y-auto">
            <header data-role="app-header" class="sticky flex items-center justify-between w-full h-16 px-6 shadow">
                <div class="flex items-center gap-4">
                    <div id="sidebar-button" class="w-6 h-6" x-on:click="sidebar_is_open = !sidebar_is_open">
                        <template x-if="sidebar_is_open">
                            <x-fas-square-xmark />
                        </template>

                        <template x-if="!sidebar_is_open">
                            <x-fas-square-poll-horizontal />
                        </template>
                    </div>

                    @yield('app-header')
                </div>


                <div class="flex items-center justify-center gap-2">
                    <p> <span class="font-bold ">Hello, </span> {{ Auth::user()->name }}</p>
                    <x-avatar name="{{ Auth::user()->name }}" asset="{{ Auth::user()->image_path }}" class="w-12 h-12"
                        href="{{ route('setting') }}" />
                </div>
            </header>
            <div class="flex-grow w-full overflow-y-auto">
                @yield('content')
            </div>
        </div>
    </div>
@endsection

@pushOnce('component')
    <x-server-request-script />
@endPushOnce

@pushOnce('page')
    <script>
        document.querySelectorAll("a").forEach(
            link => link.addEventListener("click", () => PageLoader.show())
        );

        document.querySelectorAll("form[action][method]").forEach(
            form => form.addEventListener("submit", () => PageLoader.show())
        );
    </script>
@endPushOnce
