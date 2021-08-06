<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['id'];

    /**
     * List of movie genres for each code.
     *
     * @var array
     */
    protected $genre_movie_list = [
        'Action' => 28,
        'Adventure' => 12,
        'Animation' => 16,
        'Comedy' => 35,
        'Crime' => 80,
        'Documentary' => 99,
        'Drama' => 18,
        'Family' => 10751,
        'Fantasy' => 14,
        'History' => 36,
        'Horror' => 27,
        'Music' => 10402,
        'Mystery' => 9648,
        'Romance' => 10749,
        'Science Fiction' => 878,
        'TV Movie' => 10770,
        'Thriller' => 53,
        'War' => 10752,
        'Western' => 37,
    ];

    /**
     * List of tv show genres for each code.
     *
     * @var array
     */
    protected $genre_tv_list = [
        'Action & Adventure' => 10759,
        'Animation' => 16,
        'Comedy' => 35,
        'Crime' => 80,
        'Documentary' => 99,
        'Drama' => 18,
        'Family' => 10751,
        'Kids' => 10762,
        'Mystery' => 9648,
        'News' => 10763,
        'Reality' => 10764,
        'Sci-Fi & Fantasy' => 10765,
        'Soap' => 10766,
        'Talk' => 10767,
        'War & Politics' => 10768,
        'Western' => 37,
    ];

    /**
     * List of genres.
     *
     * @var array
     */
    protected $coincidences = [];

    /**
     * Get top 100 movies of TMDB API.
     * 
     * @param int $page Number of page to search.
     * 
     * @return array Movies and its available data.
     */
    public function getTopMovies(int $page = 1): array
    {
        /**
         * Before do a request, we check if we have results cached.
         */
        $cacheKey = 'movies';
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        /**
         * Array of data.
         * 
         * @var array 
         */
        $total_top_rated_movies = [];

        /**
         * If we've 20 results / page, then 5 pages it's equals to 100 results.
         */
        do {
            $total_top_rated_movies =
                array_merge(
                    $total_top_rated_movies,
                    \TMDB::getTop('movie', ['page' => $page])->results
                );
            $page++;
        } while (6 !== $page);

        Cache::put($cacheKey, $total_top_rated_movies, now()->addMinutes(30));

        return $total_top_rated_movies;
    }

    /**
     * Get the categories name of each genre_id.
     * 
     * @param string $type It will be 'movie' or 'tv'.
     * @param array|int $genre_ids Number or numbers of categories.
     * 
     * @return array|string Names of categories.
     */
    public function getCategory(string $type, array|int $genre_ids): array|string
    {
        strtolower($type) === 'movie' ?
            $genre_list = $this->genre_movie_list
            :
            $genre_list = $this->genre_tv_list;

        if (is_array($genre_ids)) {
            foreach ($genre_ids as $genre_id) {
                array_push(
                    $this->coincidences,
                    array_search(
                        $genre_id,
                        $genre_list
                    )
                );
            }
            return $this->coincidences;
        }

        return array_search($genre_ids, $genre_list, true);
    }


    /**
     * Get details about the movie chooses.
     *
     * @param int $id Movie identifation.
     * 
     * @return object Movie detailed with available videos.
     */
    public function getMovieDetails(int $id): object
    {
        return \TMDB::getDetails('movie', $id, true);
    }

    /**
     * Return movies id that users has added.
     * 
     * @return array movie_id column of movie_user pivot table.
     */
    public function getFavmovies(): array
    {
        $user = User::findOrfail(Auth::user()->id);
        $pivot_movies_ids = DB::table('movie_user')
            ->where('user_id', '=', $user->id)
            ->get();

        return $pivot_movies_ids->pluck('movie_id')->toArray();
    }

    /**
     * Store data within database.
     */
    public function store(int $movie_id, string $title, string $poster_path)
    {
        $user = User::findOrfail(Auth::user()->id);
        Movie::updateOrCreate([
            'id' => $movie_id,
        ]);

        $user->movies()->attach(
            Auth::user()->id,
            [
                'movie_id' => $movie_id,
                'title' => $title,
                'img_path' => $poster_path,
            ]
        );
    }

    /**
     * Delete data from database.
     */
    public function del(int $movie_id)
    {
        $user = User::findOrfail(Auth::user()->id);
        $user->movies()->detach($movie_id);
    }

    /**
     * The users that belong to the movie fav.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
