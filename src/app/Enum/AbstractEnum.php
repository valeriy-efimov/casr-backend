<?php

declare(strict_types=1);

namespace App\Enum;

abstract class AbstractEnum
{
    /**
     * @return int[]|string[]
     */
    abstract public static function getValues(): array;

    /**
     * @return int|string
     */
    abstract public function getValue();

    /**
     * @param \App\Enum\AbstractEnum|null $value
     *
     * @return bool
     */
    final public function is(?AbstractEnum $value): bool
    {
        if ($value === null) {
            return false;
        }

        if ($value instanceof static && $this->getValue() === $value->getValue()) {
            return true;
        }

        return false;
    }
}
