<div class="flex flex-wrap -m-4">
    @for ($a=0; $a<12; $a++) <x-movieweb.movies.movietop>
        <x-slot name="category">
            Sci-Fi
        </x-slot>
        <x-slot name="title">
            Title
        </x-slot>
        <x-slot name="overview">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis provident incidunt totam porro, corrupti quasi asperiores amet, eaque repellendus voluptates, blanditiis placeat quisquam nisi iure obcaecati itaque nesciunt? Natus, ut.
        </x-slot>
        <x-slot name="id">
            12
        </x-slot>
        </x-movieweb.movies.movietop>
        @endfor
</div>
