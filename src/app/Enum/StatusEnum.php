<?php

declare(strict_types=1);

namespace App\Enum;

class StatusEnum extends StringEnum
{
    /**
     * @var string
     */
    public const ACTIVE = 'Active';

    /**
     * @var string
     */
    public const INACTIVE = 'Inactive';

    /**
     * @return string[]
     */
    public static function getValues(): array
    {
        return [
            self::ACTIVE   => self::ACTIVE,
            self::INACTIVE => self::INACTIVE,
        ];
    }

    /**
     * @return string[]
     */
    public static function getNames(): array
    {
        return self::getValues();
    }

    /**
     * @return static
     */
    public static function active(): self
    {
        return static::make(self::ACTIVE);
    }

    /**
     * @return bool
     */
    public function inactive(): bool
    {
        return $this->value === self::INACTIVE;
    }
}
