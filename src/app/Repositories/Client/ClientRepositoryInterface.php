<?php

declare(strict_types=1);

namespace App\Repositories\Client;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ClientRepositoryInterface
{

    /**
     * @param \App\Repositories\Client\SearchClientModel $model
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(SearchClientModel $model): LengthAwarePaginator;
}
