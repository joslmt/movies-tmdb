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

                <section class="text-gray-600 body-font">
                    <div class="container mx-auto flex px-5 py-18 md:flex-row flex-col items-center">
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <img class="object-cover object-center rounded mb-5" alt="" src="http://image.tmdb.org/t/p/w400/{{ $movie_details->poster_path }}">
                        </div>
                        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pl-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $movie_details->title }}
                                <p class="text-gray-400 text-lg font-bold">{{ $movie_details->genres[0]->name }}</p>
                            </h1>
                            <p class="mb-8 leading-relaxed">{{ $movie_details->overview }}</p>

                            @auth
                            <div class="flex justify-center">
                                @if(in_array($movie_details->id, $userFavMovies))
                                <form action="{{ route('delete', $movie_details->id) }}" method="post">
                                    @csrf
                                    <button class="flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Delete from favorites</button>
                                </form>
                                @else
                                <form action="{{ route('store', 
                                [ $movie_details->id, $movie_details->title,  substr($movie_details->poster_path, 1) ]
                                ) }}" method="post">
                                    @csrf
                                    <button class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Add to favorites</button>
                                </form>
                                @endif
                            </div>
                            @endauth

                        </div>
                </section>
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
