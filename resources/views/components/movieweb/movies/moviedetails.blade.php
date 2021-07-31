<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold">
                movie details
            </h3>
        </div>

        <!-- 
            Movie detailed
         -->
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-22 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                    <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/580x480">
                </div>
                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Before they sold out
                        <br class="hidden lg:inline-block">readymade gluten
                    </h1>
                    <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air plant cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic tumeric truffaut hexagon try-hard chambray.</p>
                    <div class="flex justify-center">
                        <x-movieweb.general.favbuttons>
                            <x-slot name="id">
                                1
                            </x-slot>
                        </x-movieweb.general.favbuttons>
                        <button class="ml-5 text-white bg-gray-500 border-0 py-1 px-6 focus:outline-none hover:bg-gray-600 rounded text-lg">Go back</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- 
            Videos
         -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-gray-800 text-2xl text-center font-bold">
                available videos
            </h3>
        </div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <x-movieweb.general.videos></x-movieweb.general.videos>
                    <x-movieweb.general.videos></x-movieweb.general.videos>
                    <x-movieweb.general.videos></x-movieweb.general.videos>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
