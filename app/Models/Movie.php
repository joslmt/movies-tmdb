<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

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
     * Get top movies.
     *
     * @return array Movies and its available data.
     */
    public function getTopMovies(): array
    {
        return \TMDB::getTop('movie')->results;
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
     * The users that belong to the movie fav.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
