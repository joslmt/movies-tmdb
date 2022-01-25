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

    public function topMovies(int $page = 1): array
    {
        $cacheKey = 'movies';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $total_top_rated_movies = [];

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
    

    public function movieDetails(int $id): object
    {
        return \TMDB::getDetails('movie', $id, true);
    }

    public function profileInfo(): array
    {
        $user = User::findOrfail(Auth::user()->id);
        return DB::table('movie_user')
            ->where('user_id', '=', $user->id)
            ->get()
            ->toArray();
    }
   
    public function searchMovie(string $movie): array
    {
        $cacheKey = "searchResults{$movie}";

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $search = \TMDB::searchAsync('movie', $movie);
        Cache::put($cacheKey, $search, now()->addMinutes(30));
        return $search;
    }

    public function profileUserDescription(): string
    {
        $userDescription = User::select('description')->where('id', '=', (Auth::user()->id))->pluck('description');
        return $userDescription->toArray()[0];
    }

    public function updateDescription(string $description): void
    {
        $user = User::findOrfail(Auth::user()->id);
        $user->description = $description;
        $user->save();
    }

    public function favouriteMovies(): ?array
    {
        if (Auth::user()) {
            $user = User::findOrfail(Auth::user()->id);
            return DB::table('movie_user')
                ->where('user_id', '=', $user->id)
                ->get()
                ->pluck('movie_id')
                ->toArray();
        }
        return null;
    }

    public function saveMovie(int $movie_id, string $title, string $poster_path): void
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

    public function removeMovie(int $movie_id): void
    {
        $user = User::findOrfail(Auth::user()->id);
        $user->movies()->detach($movie_id);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
