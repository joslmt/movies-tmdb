<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="text-gray-800 text-2xl text-center font-bold">
                movies found
            </h3>
            <x-movieweb.general.search></x-movieweb.general.search>
            <div class="grid grid-cols-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($movies as $movie)
                <div class="w-auto my-0.5 mx-0.5 flex relative">
                    <div class="flex flex-wrap -m-4">
                        @if (empty($movie->poster_path))
                        <p class="p-5 m-5 text center font-bold">Not available image</p>
                        @else
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="http://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}">
                        @endif
                        <div class="px-6 py-8 relative z-10 w-full bg-white opacity-0 hover:opacity-100 transition duration-300">
                            <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">{{ $movie->category }}</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                {{ $movie->title }}
                            </h1>
                            <p class="leading-relaxed my-4">
                                {{ $movie->overview }}<a class="font-bold" href="{{ route('seemore', $movie->id) }}"> See more ...</a>
                            </p>

                            @auth
                            @if(in_array($movie->id, $userFavMovies))
                            <form action="{{ route('delete', $movie->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Delete from favorites</button>
                            </form>
                            @else
                            <form action="{{ route('store', 
                                [ $movie->id, $movie->title,  substr($movie->poster_path, 1) ]
                                ) }}" method="post">
                                @csrf
                                <button class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Add to favorites</button>
                            </form>
                            @endif
                            @endauth

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $paginator->links() }}
        </div>
    </div>
</x-app-layout>
