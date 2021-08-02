<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="text-gray-800 text-2xl text-center font-bold">
                top rated movies
            </h3>

            <!-- 
                Search movies
             -->
            <x-movieweb.general.search></x-movieweb.general.search>

            <!-- 
                Top rated movies
             -->
            <div class="grid grid-cols-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($movies as $movie)
                <x-movieweb.movies.moviestop>
                    <x-slot name="poster_path">
                        {{ $movie->poster_path }}
                    </x-slot>
                    <x-slot name="category">
                        {{ $movie->category }}
                    </x-slot>
                    <x-slot name="title">
                        {{ $movie->title }}
                    </x-slot>
                    <x-slot name="overview">
                        {{ $movie->overview }}
                    </x-slot>
                    <x-slot name="id">
                        {{ $movie->id }}
                    </x-slot>
                </x-movieweb.movies.moviestop>
                @endforeach

            </div>

            <!-- 
                Pagination
             -->
            <ul class="flex justify-end mr-6 gap-2 mt-4">
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-500 rounded-lg">
                    <a class="flex items-center font-bold" href="#">
                        <span class="mx-1">previous</span>
                    </a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="font-bold" href="#">1</a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="font-bold" href="#">2</a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="font-bold" href="#">3</a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="flex items-center font-bold" href="#">
                        <span class="mx-1">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
