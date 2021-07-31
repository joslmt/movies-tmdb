<div id="app">
    <button class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" @click="isFavorite = true" v-show="!isFavorite">Add to favorites {{ $id }}</button>
    <button class="flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded" @click="isFavorite = false" v-show="isFavorite">Delete from favorites {{ $id }}</button>
</div>
