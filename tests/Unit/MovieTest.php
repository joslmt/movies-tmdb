<?php

namespace Tests\Unit;

use App\Models\Movie;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * Return an instance of Movie model.
     *
     * @return Movie
     */
    private function getMovieInstance(): Movie
    {
        return $this->app->make(Movie::class);
    }
    /**
     * @test
     * 
     * Comprobar que devuelve un array de 100 películas.
     */
    public function return_an_array_of_100_movies()
    {
        $arrayMovies = $this->getMovieInstance()->getTopMovies(1);
        $this->assertIsArray($arrayMovies, "It\'s not an array");
        $this->assertCount(100, $arrayMovies, "There're less than 100");
    }

    /**
     * @test 
     * 
     *  Comprobar que devuelve el nombre de categoría correcto.
     */
    public function return_a_string_with_correct_category_name()
    {
        $actionCategory = 28;

        $categoryName = $this->getMovieInstance()->getCategory(
            'movie',
            $actionCategory
        );

        $this->assertIsString($categoryName, "It\'s not a string");
        $this->assertEquals('Action', $categoryName, 'Incorrect category name');
    }

    /**
     * @test 
     */
    public function return_an_object_of_movie_details()
    {
        $theGodFatherMovieId = 238;

        $movie = $this->getMovieInstance()->getMovieDetails($theGodFatherMovieId);

        $this->assertObjectHasAttribute('title', $movie);
        $this->assertObjectHasAttribute('overview', $movie);
        $this->assertObjectHasAttribute('poster_path', $movie);
        $this->assertObjectHasAttribute('popularity', $movie);
        $this->assertObjectHasAttribute('vote_average', $movie);
        $this->assertObjectHasAttribute('videos', $movie);
    }
}
