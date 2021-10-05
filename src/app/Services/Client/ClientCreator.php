<?php

declare(strict_types=1);

namespace App\Services\Client;

use App\Enum\StatusEnum;
use App\Models\Client\Client;
use App\Models\Client\CreateClientModelInterface;
use App\Services\GeoCoordinate\GeoCoordinatesServiceInterface;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class ClientCreator
{
    /**
     * @var \Carbon\CarbonInterface|\Carbon\Carbon
     */
    private CarbonInterface $carbon;

    /**
     * @var \App\Services\GeoCoordinate\GeoCoordinatesServiceInterface
     */
    private GeoCoordinatesServiceInterface $geoCoordinatesService;

    /**
     * @param \Carbon\Carbon                                             $carbon
     * @param \App\Services\GeoCoordinate\GeoCoordinatesServiceInterface $geoCoordinatesService
     */
    public function __construct(Carbon $carbon, GeoCoordinatesServiceInterface $geoCoordinatesService)
    {
        $this->carbon                = $carbon;
        $this->geoCoordinatesService = $geoCoordinatesService;
    }

    /**
     * @param \App\Models\Client\CreateClientModelInterface $model
     *
     * @return \App\Models\Client\Client
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function create(CreateClientModelInterface $model): Client
    {
        $geo = $this->geoCoordinatesService->getCoordinates($this->getAddress($model));

        $now = $this->carbon->now();

        $client = new Client();

        $client->status = StatusEnum::active();

        $client->client_name    = $model->getClientName();
        $client->address1       = $model->getAddress1();
        $client->address2       = $model->getAddress2();
        $client->city           = $model->getCity();
        $client->state          = $model->getState();
        $client->country        = $model->getCountry();
        $client->latitude       = $geo['lat'];
        $client->longitude      = $geo['lng'];
        $client->phone_no1      = $model->getPhoneNo1();
        $client->phone_no2      = $model->getPhoneNo2();
        $client->zip            = $model->getZipCode();
        $client->start_validity = $now;
        $client->end_validity   = $now->clone()->addDays(15);

        $client->save();

        return $client;
    }

    /**
     * @param \App\Models\Client\CreateClientModelInterface $model
     *
     * @return string
     */
    protected function getAddress(CreateClientModelInterface $model): string
    {
        return $model->getAddress1() . ' '
            . $model->getAddress2() . ', '
            . $model->getCity() . ', '
            . $model->getState() . ', '
            . $model->getCountry();
    }
}
