<div class="lg:w-1/3 sm:w-1/2 p-4">
    <div class="flex relative">
        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="https://dummyimage.com/601x361">
        <div class="px-6 py-8 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
            <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">{{ $category }}</h2>
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                {{ $title }}
            </h1>
            <p class="leading-relaxed my-4">
                {{ $overview }}<a class="font-bold" href="{{ route('seemore') }}"> See more ...</a>
            </p>
            <x-movieweb.general.favbuttons>
                <x-slot name="id">
                    {{ $id }}
                </x-slot>
            </x-movieweb.general.favbuttons>
        </div>
    </div>
</div>
