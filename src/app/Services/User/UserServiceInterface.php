<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\Client\Client;
use App\Models\User\CreateUserModelInterface;
use App\Models\User\User;

interface UserServiceInterface
{

    /**
     * @param \App\Models\Client\Client                 $client
     * @param \App\Models\User\CreateUserModelInterface $model
     *
     * @return \App\Models\User\User
     */
    public function create(Client $client, CreateUserModelInterface $model): User;
}
