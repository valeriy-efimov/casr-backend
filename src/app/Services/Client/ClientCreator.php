<?php

declare(strict_types=1);

namespace App\Services\Client;

use App\Enum\StatusEnum;
use App\Models\Client\Client;
use App\Models\Client\CreateClientModelInterface;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class ClientCreator
{
    /**
     * @var \Carbon\CarbonInterface|\Carbon\Carbon
     */
    private CarbonInterface $carbon;

    /**
     * @param \Carbon\Carbon $carbon
     */
    public function __construct(Carbon $carbon)
    {
        $this->carbon = $carbon;
    }

    /**
     * @param \App\Models\Client\CreateClientModelInterface $model
     *
     * @return \App\Models\Client\Client
     */
    public function create(CreateClientModelInterface $model): Client
    {
        $now = $this->carbon->now();

        $client = new Client();

        $client->status = StatusEnum::active();

        $client->client_name    = $model->getClientName();
        $client->address1       = $model->getAddress1();
        $client->address2       = $model->getAddress2();
        $client->city           = $model->getCity();
        $client->state          = $model->getState();
        $client->country        = $model->getCountry();
        $client->latitude       = 1;
        $client->longitude      = 1;
        $client->phone_no1      = $model->getPhoneNo1();
        $client->phone_no2      = $model->getPhoneNo2();
        $client->zip            = $model->getZipCode();
        $client->start_validity = $now;
        $client->end_validity   = $now->addDays(15);

        $client->save();

        return $client;
    }
}
