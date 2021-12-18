<div class="py-12 max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-md mb-5 ">
        <form action="{{ route('search') }}" class="flex justify-between" method="get">
            <div class="flex w-full">
                <input type="text" placeholder="Blade runner" name="movie" id="" class="p-3 w-full border-none">
                <input type="submit" value="search" class="w-1/3 bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 border-none">
        </form>
    </div>
</div>
