<img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="http://image.tmdb.org/t/p/w500/{{$poster_path}}">
<div class="px-6 py-8 relative z-10 w-full bg-white opacity-0 hover:opacity-100 transition duration-300">
    <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">{{ $category }}</h2>
    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
        {{ $title }}
    </h1>
    <p class="leading-relaxed my-4">
        {{ $overview }}<a class="font-bold" href="{{ route('seemore', $id) }}"> See more ...</a>
    </p>
    <x-movieweb.general.favbuttons>
        <x-slot name="id">
            {{ $id }}
        </x-slot>
    </x-movieweb.general.favbuttons>
</div>
