<?php

declare(strict_types=1);

namespace App\CastsAttributes;

use App\Enum\StatusEnum;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class StatusCast implements CastsAttributes
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param mixed[]                             $attributes
     *
     * @return \App\Enum\StatusEnum
     */
    public function get($model, string $key, $value, array $attributes): StatusEnum
    {
        return StatusEnum::make($value);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param mixed[]                             $attributes
     *
     * @return string
     */
    public function set($model, string $key, $value, array $attributes): string
    {
        if (!$value instanceof StatusEnum) {
            throw new InvalidArgumentException("Incorrect Status Provided");
        }

        return $value->getValue();
    }
}
