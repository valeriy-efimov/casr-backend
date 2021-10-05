<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Enum\StatusEnum;
use App\Models\Client\Client;
use App\Models\User\CreateUserModelInterface;
use App\Models\User\User;
use Carbon\CarbonInterface;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Carbon;

class UserCreator
{

    /**
     * @var \Carbon\CarbonInterface|\Carbon\Carbon
     */
    private CarbonInterface $carbon;

    /**
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    private Hasher $hasher;

    /**
     * @param \Illuminate\Support\Carbon           $carbon
     * @param \Illuminate\Contracts\Hashing\Hasher $hasher
     */
    public function __construct(Carbon $carbon, Hasher $hasher)
    {
        $this->hasher = $hasher;
        $this->carbon = $carbon;
    }

    /**
     * @param \App\Models\Client\Client                 $client
     * @param \App\Models\User\CreateUserModelInterface $model
     *
     * @return \App\Models\User\User
     */
    public function create(Client $client, CreateUserModelInterface $model): User
    {

        $user = new User();
        $user->client()->associate($client);

        $user->first_name          = $model->getFirstName();
        $user->last_name           = $model->getLastName();
        $user->email               = $model->getEmail();
        $user->password            = $this->hasher->make($model->getPassword());
        $user->phone               = $model->getPhone();
        $user->last_password_reset = $this->carbon->now();
        $user->status              = StatusEnum::active();

        $user->save();

        return $user;
    }
}
