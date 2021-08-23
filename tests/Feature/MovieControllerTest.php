<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Movie data to use.
     *
     * @var array
     */
    private $movieData = [
        'id' => 278,
        'title' => 'The Shawshank Redemption',
        'poster_path' => 'q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg'
    ];

    /**
     * Get an auth user.
     * 
     * @return User 
     */
    private function getAuthUser()
    {
        $user = User::factory()->create(['id' => 1]);
        /** 
         * @var \Illuminate\Contracts\Auth\Authenticatable $user 
         * */
        return $this->actingAs($user);
    }

    /**
     * Store data into database and also get user auth.
     */
    private function storeData()
    {
        $this->getAuthUser();
        $this->post(route(
            'store',
            $this->movieData
        ));
    }

    /**
     * @test
     */
    public function guess_users_can_see_homepage()
    {
        $this->get(route('home'))
            ->assertSuccessful()
            ->assertSee('top 100 rated movies');
    }

    /**
     * @test
     */
    public function guess_users_can_see_more_info_about_movies()
    {
        $this->get(route('seemore', 278))
            ->assertSuccessful()
            ->assertSee('The Shawshank Redemption');
    }

    /**
     * @test 
     */
    public function auth_users_can_store_movie_data()
    {
        $this->getAuthUser();
        $this->post(route(
            'store',
            $this->movieData
        ));

        $this->assertDatabaseHas('movies', ['id' => 278]);
    }

    /**
     * @test 
     */
    public function data_stored_can_be_rendered_into_users_profile()
    {
        $this->storeData();
        $this->get(route('profile'))
            ->assertSuccessful()
            ->assertSee('The Shawshank Redemption');
    }

    /**
     * @test 
     */
    public function data_stored_can_be_deleted_from_auth_user()
    {
        $this->storeData();
        $this->post(route('delete', $this->movieData['id']));
        $this->assertDatabaseMissing('movies', ['movie_id' => 278]);
    }
}
