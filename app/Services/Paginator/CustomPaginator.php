<?php

declare(strict_types=1);

namespace App\Services\Paginator;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

interface CustomPaginator
{
    public function create(mixed $items, int $total, int $perPage, ?int $currentPage, ?array $options = []): Paginator;
    public function paginate(array $dataToPaginate, int $offSet, int $itemsPerPage): array;
}
