<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold pb-6">
                movies founded
            </h3>
            <!-- 
                Search movies
             -->
            <x-movieweb.general.search></x-movieweb.general.search>
            <!-- 
                Movies founded
             -->
            <x-movieweb.movies.moviestop></x-movieweb.movies.moviestop>

            <!-- 
                Pagination
             -->
            <ul class="flex justify-end mr-6 gap-2 mt-4">
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-500 rounded-lg">
                    <a class="flex items-center font-bold" href="#">
                        <span class="mx-1">previous</span>
                    </a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="font-bold" href="#">1</a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="font-bold" href="#">2</a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="font-bold" href="#">3</a>
                </li>
                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="flex items-center font-bold" href="#">
                        <span class="mx-1">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
