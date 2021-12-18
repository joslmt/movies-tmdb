<?php

namespace Tests\Unit;

use App\Models\Movie;
use Tests\TestCase;

class MovieTest extends TestCase
{
  
    private function movie(): Movie
    {
        return $this->app->make(Movie::class);
    }

    /**
     * @test
     */
    public function return_an_array_of_100_movies()
    {
        $arrayMovies = $this->movie()->topMovies(1);
        $this->assertIsArray($arrayMovies, "It\'s not an array");
        $this->assertCount(100, $arrayMovies, "There're less than 100");
    }

    /**
     * @test 
     */
    public function return_an_object_of_movie_details()
    {
        $theGodFatherMovieId = 238;

        $movie = $this->movie()->movieDetails($theGodFatherMovieId);

        $this->assertObjectHasAttribute('title', $movie);
        $this->assertObjectHasAttribute('overview', $movie);
        $this->assertObjectHasAttribute('poster_path', $movie);
        $this->assertObjectHasAttribute('popularity', $movie);
        $this->assertObjectHasAttribute('vote_average', $movie);
        $this->assertObjectHasAttribute('videos', $movie);
    }
}
