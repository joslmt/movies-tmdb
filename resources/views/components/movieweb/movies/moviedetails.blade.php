<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold mb-5">
                movie details
            </h3>
        </div>

        <!-- 
            Movie detailed
         -->
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-22 md:flex-row flex-col items-center">

                <x-movieweb.movies.details>
                    <x-slot name="poster_path">
                        {{ $movie_details->poster_path }}
                    </x-slot>
                    <x-slot name="category">
                        {{ $movie_details->genres[0]->name }}
                    </x-slot>
                    <x-slot name="title">
                        {{ $movie_details->title }}
                    </x-slot>
                    <x-slot name="overview">
                        {{ $movie_details->overview }}
                    </x-slot>
                    <x-slot name="id">
                        {{ $movie_details->id }}
                    </x-slot>

                </x-movieweb.movies.details>

            </div>
        </section>

        <!-- 
            Videos
         -->
        @if (count($videos) > 0)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold">
                available videos
            </h3>
        </div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    @foreach ($videos as $video)
                    <div class="p-4 lg:w-1/3">
                        <iframe id="" width="540" height="360" src="https://www.youtube.com/embed/{{ $video->key }}?autoplay=0&mute=1&enablejsapi=1" frameborder="0" class="py-2"></iframe>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold">
                no available videos
            </h3>
        </div>
        @endif
    </div>
</x-app-layout>
