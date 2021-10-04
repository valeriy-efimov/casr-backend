<?php

declare(strict_types=1);

namespace App\Services\Client;

use App\Models\Client\Client;
use App\Models\Client\CreateClientModelInterface;

class ClientService implements ClientServiceInterface
{

    /**
     * @var \App\Services\Client\ClientCreator
     */
    private ClientCreator $creator;

    /**
     * @param \App\Services\Client\ClientCreator $creator
     */
    public function __construct(ClientCreator $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @param \App\Models\Client\CreateClientModelInterface $model
     *
     * @return \App\Models\Client\Client
     */
    public function create(CreateClientModelInterface $model): Client
    {
        return $this->creator->create($model);
    }
}
