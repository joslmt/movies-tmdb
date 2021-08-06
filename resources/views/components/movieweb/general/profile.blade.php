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

                                    <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
                                    <input type='file' class="hidden" />
                                    <input type="submit" value="upload" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                </label>

                            </div>
                            <div class="md:flex-grow">
                                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">
                                    {{ Auth::user()->name }}
                                </h2>

                                <p class="leading-relaxed">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum, saepe blanditiis nemo enim iste libero quae natus commodi necessitatibus pariatur quam corporis qui temporibus dignissimos, accusamus iure esse vitae.
                                </p>
                                <div class="flex">
                                    <a href="#">
                                        <button class="shadow bg-purple-300 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded" type="button">
                                            Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('home') }}">
                                        <button class="ml-2 flex text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">Back</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold">
                fav movies added
            </h3>
        </div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">

                    @for ($a=0; $a<4; $a++) <x-movieweb.movies.moviesfav>
                        <x-slot name="title">
                            Blade Runner
                        </x-slot>
                        </x-movieweb.movies.moviesfav>
                        @endfor
                </div>
            </div>
        </section>

    </div>
</x-app-layout>
