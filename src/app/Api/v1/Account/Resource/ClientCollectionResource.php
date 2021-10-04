<?php

declare(strict_types=1);

namespace App\Api\v1\InspirationImage\Resource;

namespace App\Api\v1\Account\Resource;

use App\Http\Resource\JsonCollectionResource;

class ClientCollectionResource extends JsonCollectionResource
{
    /**
     * @var string
     */
    protected string $resourceClass = ClientResource::class;
}
