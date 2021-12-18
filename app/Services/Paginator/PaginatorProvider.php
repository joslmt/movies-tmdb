<?php

declare(strict_types=1);

namespace App\Services\Paginator;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

final class PaginatorProvider implements CustomPaginator
{
    public function create(mixed $items, int $total, int $perPage, int $currentPage = null, ?array $options = []): Paginator
    {
        return new Paginator(
            $items, 
            $total, 
            $perPage, 
            $currentPage ?? Paginator::resolveCurrentPage(), 
            $options ?? [
                'path'  => Paginator::resolveCurrentPath(),
            ]
        );
    }

    public function paginate(array $dataToPaginate, int $offSet, int $itemsPerPage): array
    {
        $offSet = $this->calculateOffSet(Paginator::resolveCurrentPage(), $itemsPerPage);
        return array_slice(
            $dataToPaginate,
            $offSet,
            $itemsPerPage
        );
    }

    private function calculateOffSet(int $page, int $itemsPerPage): int
    {
        return ($page * $itemsPerPage) - $itemsPerPage;
    }
}