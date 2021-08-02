<div class="w-auto my-0.5 mx-0.5 flex relative">
    <div class="flex flex-wrap -m-4">
        <x-movieweb.movies.movietop>
            <x-slot name="poster_path">
                {{ $poster_path }}
            </x-slot>
            <x-slot name="category">
                {{ $category }}
            </x-slot>
            <x-slot name="title">
                {{ $title }}
            </x-slot>
            <x-slot name="overview">
                {{ $overview }}
            </x-slot>
            <x-slot name="id">
                {{ $id }}
            </x-slot>
        </x-movieweb.movies.movietop>
    </div>
</div>
