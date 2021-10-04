<?php

declare(strict_types=1);

namespace App\Services\Client;

use App\Models\Client\Client;
use App\Models\Client\CreateClientModelInterface;

interface ClientServiceInterface
{

    /**
     * @param \App\Models\Client\CreateClientModelInterface $model
     *
     * @return \App\Models\Client\Client
     */
    public function create(CreateClientModelInterface $model): Client;
}
