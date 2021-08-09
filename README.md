# movies-tmdb
- [movies-tmdb](#movies-tmdb)
- [What is](#what-is)
  - [Project purpose](#project-purpose)
  - [What uses](#what-uses)
  - [How to install](#how-to-install)
  - [How to configure](#how-to-configure)
  - [Testing](#testing)
    - [Why test with SQLite](#why-test-with-sqlite)
    - [How to configure](#how-to-configure-1)
    - [How to execute](#how-to-execute)
  - [License](#license)
  
# What is
It's a simple web develop with Laravel 8 that uses [The Movie Database API](https://www.themoviedb.org/documentation/api) to get detailed data about movies. 

Some features are, if you're logged, you'll could add or remove whatever movies to favourites, in your profile user there're a list of fav movies added. 

Also you can see more details about a concret movie by clicking it, details like available videos or a extensive overview.


## Project purpose
The main purpose of movies-tmdb was, and are, learn deeper concepts about Laravel like testing, routes, request, how it works or how to do a correct deploy, but the initial idea to do this project was to test my own Laravel API wrapper [joslmt/tmdb-laravel-wrapper](https://github.com/joslmt/tmdb-laravel-wrapper) .

## What uses

- Laravel 8 with the last available version at the moment [Laravel]( https://laravel.com/) . 
- Laravel Breeze for handle authentication features, [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze) .
- My custom Laravel wrapper package [joslmt/tmdb-laravel-wrapper](https://github.com/joslmt/tmdb-laravel-wrapper), to get information about [The Movie Database API](https://www.themoviedb.org/documentation/api) .
- "brianium/paratest" package to run parallel test.

## How to install
Clone the repository and install project dependencies with :

```
git clone git@github.com:joslmt/movies-tmdb.git

composer install
```

## How to configure
There're a few things to keep in mind after clone and installing dependencies. It's require a new `.env`, on a Linux terminal, within the main project path, do: 

```
cp .env.example .env
```

That will create a new `.env` file with the content of `.env.example` .

But it's not over, all Laravel projects have an own key, so let's generate one: 

```
php artisan key:generate
```

Now it's time to configure the database, the project uses MySQL , within `.env` complete the information relative to your database.
```
   DB_CONNECTION=mysql
   DB_HOST=
   DB_PORT=3306
   DB_DATABASE=
   DB_USERNAME=
   DB_PASSWORD=
```

## Testing
It's recommended to have a few tests to ensure the project features and to feel confident with superficial or deeper changes done on the project.

### Why test with SQLite
It's just because run faster than testing with MySQL like database, but after all the movies-tmdb also supports testing without uses `testing` environment file.

Just type the follow to execute all available tests with MySQL.
```
php artisan test
```

### How to configure
We need another `.env` file, because the previous `.env` uses MySQL like database and the project tests uses SQLite, it's necessary a few changes.

```
cp .env.example .env
```

Then replace all things relative to database connections with : 

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

Using SQLite it's only necessary two environment variables to make it works.

### How to execute
To execute test on a Laravel project we usually use the follow artisan command :

```
php artisan test
```

But now we've a new `.env` just for testing purposes, we do : 

```
php artisan test --env=testing
```

And we want to filter what test to run, for some reason.

```
php artisan test --filter FilterTest --env=testing
```

## License
The movies-tmdb is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
