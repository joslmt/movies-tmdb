<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MoviesControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Array of data for testing purpose.
     *
     * @var array
     */
    private $arrayData = [
        238,
        'The Godfather',
        '3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
    ];

    /**
     * Array of data for testing purpose.
     *
     * @var array
     */
    private $checkData = [
        'movie_id' => 238,
        'title' => 'The Godfather'
    ];

    /**
     * Return an authenticate user.
     */
    private function getAuthUser()
    {
        return $this->actingAs(User::factory()->create());
    }

    /**
     * @test
     */
    public function home_screen_can_be_rendered()
    {
        $this->get(route('home'))
            ->assertSuccessful()
            ->assertSee('top 100 rated movies');
    }

    /**
     * @test
     */
    public function users_can_see_movies_details()
    {
        $this->get(route('seemore', 238))
            ->assertSuccessful()
            ->assertSee('movie details')
            ->assertSee('The Godfather');
    }

    /**
     * @test 
     */
    public function logged_auth_users_can_see_his_profile()
    {
        $this->getAuthUser();
        $this->get(route('profile'))
            ->assertSuccessful()
            ->assertSee('users profile');
    }

    /**
     * @test 
     */
    public function logged_users_can_store_movies_in_database()
    {
        $this->getAuthUser();

        $this->post(route(
            'store',
            $this->arrayData
        ));
        $this->assertDatabaseHas(
            'movie_user',
            $this->checkData
        );
    }

    /**
     * @test 
     */
    public function logged_users_can_remove_movies_from_database()
    {
        $this->getAuthUser();

        $this->post(route(
            'store',
            $this->arrayData
        ));

        $this->assertDatabaseHas(
            'movie_user',
            $this->checkData
        );

        $this->post('/delete', ['id' => 238]);

        $this->assertDatabaseMissing(
            'movie_user',
            $this->arrayData
        );
    }
}
