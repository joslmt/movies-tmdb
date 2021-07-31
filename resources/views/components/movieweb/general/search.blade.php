<div class="py-12 max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-md">

        <form action="{{ route('search') }}" class="flex justify-between">
            <div class="flex w-full">
                <input type="text" placeholder="Blade runner" name="" id="" class="p-3 w-full border-none">
                <select name="genres" id="genres" class="w-1/3 border-none focus:bg-white focus:ring-2 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <optgroup label="Genres">
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Crime">Crime</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Drama">Drama</option>
                        <option value="Family">Family</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Music">Music</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Romance">Romance</option>
                        <option value="Science Fiction">Science Fiction</option>
                        <option value="TV Movie">TV Movie</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                    </optgroup>
                </select>
            </div>
            <input type="submit" value="search" class="w-1/3 bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 border-none">
        </form>
    </div>
</div>
