<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Services\Utils\TvData;

final class Category
{
    protected $coincidences = [];

    public function setCategoryToMovie(array $movies): void
    {
        $categoriesId = [];
        foreach ($movies as $movieCategory) {
            array_push(
                $categoriesId,
                $movieCategory->genre_ids[0] ?? 'undefined'
            );
        }

        $categoriesName = $this->searchCategories($categoriesId);
        foreach ($movies as $key => $movie) {
            $movie->category = $categoriesName[$key];
        }
    }

    private function searchCategories(array|int $categoriesId): array|string
    {
        if (is_array($categoriesId)) {
            foreach ($categoriesId as $categoryId) {
                array_push(
                    $this->coincidences,
                    array_search(
                        $categoryId,
                        TvData::MOVIE_GENRES
                    )
                );
            }
            return $this->coincidences;
        }

        return array_search($categoriesId, TvData::MOVIE_GENRES, true);
    }

}
