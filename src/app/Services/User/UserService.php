<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\Client\Client;
use App\Models\User\CreateUserModelInterface;
use App\Models\User\User;

class UserService implements UserServiceInterface
{
    /**
     * @var \App\Services\User\UserCreator
     */
    private UserCreator $creator;


    /**
     * @param \App\Services\User\UserCreator $creator
     */
    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @param \App\Models\Client\Client                 $client
     * @param \App\Models\User\CreateUserModelInterface $model
     *
     * @return \App\Models\User\User
     */
    public function create(Client $client, CreateUserModelInterface $model): User
    {
        return $this->creator->create($client, $model);
    }
}
