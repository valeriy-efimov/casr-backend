<?php

declare(strict_types=1);

namespace App\Http\Resource;

abstract class JsonCollectionResource extends JsonResource
{
    /**
     * @var string
     */
    protected string $resourceClass;

    /**
     * @var mixed[]
     */
    private array $resource;

    /**
     * @param mixed[] $resource
     */
    public function __construct(array $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return JsonResource[]
     */
    public function toArray(): array
    {
        return array_map(function ($resource) {
            return new $this->resourceClass($resource);
        }, $this->resource);
    }
}
