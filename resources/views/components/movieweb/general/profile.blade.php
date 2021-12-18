<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold">
                users profile
            </h3>
        </div>
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 pt-20 pb-14 mx-auto">
                <div class="-my-8 divide-y-2 divide-gray-100">
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 border-t">
                        <div class="py-8 flex flex-wrap md:flex-nowrap">
                            <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                <label class=" flex flex-col items-center cursor-pointer">
                                    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-30 h-30" viewBox="0 0 24 24">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                </label>
                            </div>
                            <div class="md:flex-grow">
                                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">
                                    {{ Auth::user()->name }}
                                </h2>
                                @if ($errors)
                                @foreach ($errors->all() as $message)
                                <p class="leading-relaxed my-4 text-red-600 font-semibold">{{ $message }}</p>
                                @endforeach
                                @endif
                                <form action="{{ route('description') }}" method="post">
                                    @csrf
                                    <textarea maxlength="255" class="w-full bg-white rounded border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-36 text-base outline-none text-gray-700 py-2 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" name="description" id="" cols="30" rows="10">{{ $description }}</textarea>
                                    <div class="flex">
                                        <button type="submit" class="shadow bg-purple-300 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-12 rounded" type="button">
                                            Edit
                                        </button>
                                </form>
                                <form action="{{ route('home') }}" method="get">
                                    <button onclick="window.history.back()" class="ml-2 flex text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded">Back</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if (count($favMovies) === 0)
        @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold">
                fav movies added
            </h3>
        </div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    @foreach ($favMovies as $favMovie)
                    <div class="lg:w-1/4 md:w-1/2 sm:w-1/3 p-4">
                        <div class="flex justify-between">
                            <h3 class="text-center font-bold p-2">{{ $favMovie->title }}</h3>
                            <form action="{{ route('delete', $favMovie->movie_id ) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="mb-4 flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Delete</button>
                            </form>
                        </div>
                        <a href="{{ route('movieDetails', $favMovie->movie_id ) }}" class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="http://image.tmdb.org/t/p/w500/{{ $favMovie->img_path }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>
</x-app-layout>
