<?php

declare(strict_types=1);

namespace App\Http\Resource;

use JsonSerializable;

abstract class JsonResource implements JsonSerializable
{
    /**
     * @return mixed[]
     */
    abstract public function toArray(): array;

    /**
     * @return mixed[]
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
