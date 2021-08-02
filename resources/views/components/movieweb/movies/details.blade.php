<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-18 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
            <img class="object-cover object-center rounded mb-5" alt="" src="http://image.tmdb.org/t/p/w400/{{ $poster_path }}">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pl-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $title }}
                <p class="text-gray-400 text-lg font-bold">{{ $category }}</p>
            </h1>
            <p class="mb-8 leading-relaxed">{{ $overview }}<a class="font-bold" href="{{ route('seemore', $id) }}"> See more ...</a></p>
            <div class="flex justify-center">
                <x-movieweb.general.favbuttons>
                    <x-slot name="id">
                        {{ $id }}
                    </x-slot>
                </x-movieweb.general.favbuttons>
            </div>
        </div>
</section>
