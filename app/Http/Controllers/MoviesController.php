<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class MoviesController extends Controller
{
    /**
     * Display a list of the actually top rated movies.
     * 
     * @param Movie $movie Get need it data. 
     * @return View
     */
    public function index(Movie $movie, Request $request): View
    {
        /**
         * User fav movies.
         */
        $userFavMovies = $movie->getFavmovies();

        /**
         * Array of objects.
         */
        $movies = $movie->getTopMovies();

        /**
         * Array of genre_ids of each one movie.
         */
        $categories_with_id = [];
        foreach ($movies as $movie_category) {
            array_push($categories_with_id, $movie_category->genre_ids[0]);
        }

        /**
         * Array resultant of translate genre_id, get categories names.
         */
        $categories_with_name =
            $movie->getCategory('movie', $categories_with_id);

        /**
         * Add a new property to inicial object.
         */
        foreach ($movies as $key => $movie) {
            $movie->category = $categories_with_name[$key];
        }

        /**
         * Custom pagination.
         */
        $page =  Paginator::resolveCurrentPage();
        $perPage = 12;
        $offset = ($page * $perPage) - $perPage;

        $paginator = new Paginator(
            $movies,
            count($movies),
            $perPage,
            $page,
            ['path'  => Paginator::resolveCurrentPath()]
        );

        $movies = array_slice($movies,  $offset, $perPage);
        return view('dashboard', compact('movies', 'paginator', 'userFavMovies'));
    }

    /**
     * Display movie details.
     *
     * @param Movie $movie
     * @param int $id
     * @return View
     */
    public function seeMore(Movie $movie, int $id): View
    {
        /**
         * No visualiza el iframe.
         */
        $userFavMovies = $movie->getFavmovies();

        $movie_details = $movie->getMovieDetails($id);
        $videos = $movie_details->videos->results;
        return view('components.movieweb.movies.moviedetails', compact('movie_details', 'videos', 'userFavMovies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @inheritDoc
     */
    public function getFavMovies(Movie $movie): array
    {
        return $movie->getFavmovies();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Movie $movie, int $id, string $title, string $poster_path)
    {
        $movie->store($id, $title, $poster_path);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie, int $movie_id)
    {
        $movie->del($movie_id);
        return redirect()->back();
    }
}
