<?php

declare(strict_types=1);

namespace App\Api\v1\Account\Resource;

use App\Http\Resource\JsonResource;
use App\Models\Client\Client;

class ClientResource extends JsonResource
{

    /**
     * @var \App\Models\Client\Client
     */
    private Client $client;

    /**
     * InspirationImageResource constructor.
     *
     * @param \App\Models\Client\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed[]
     */
    public function toArray(): array
    {

        return [
            'id'            => $this->client->id,
            'name'          => $this->client->client_name,
            'address1'      => $this->client->address1,
            'address2'      => $this->client->address2,
            'city'          => $this->client->city,
            'state'         => $this->client->state,
            'country'       => $this->client->country,
            'zipCode'       => $this->client->zip,
            'latitude'      => $this->client->latitude,
            'longitude'     => $this->client->longitude,
            'phoneNo1'      => $this->client->phone_no1,
            'phoneNo2'      => $this->client->phone_no2,
            'startValidity' => $this->client->start_validity->toDateString(),
            'endValidity'   => $this->client->end_validity->toDateString(),
            'status'        => $this->client->status->getValue(),
            'createdAt'     => $this->client->created_at,
            'updatedAt'     => $this->client->updated_at,
        ];
    }
}
