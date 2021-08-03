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
            <x-movieweb.general.search></x-movieweb.general.search>
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
            {{ $paginator->links() }}
        </div>
    </div>
</x-app-layout>
