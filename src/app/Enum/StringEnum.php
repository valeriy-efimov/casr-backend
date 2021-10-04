<?php

declare(strict_types=1);

namespace App\Enum;
use InvalidArgumentException;

abstract class StringEnum extends AbstractEnum
{
    /**
     * @var static[][]
     */
    private static array $instances;

    /**
     * @var string
     */
    protected string $value;

    /**
     * @param string $value
     */
    final protected function __construct(string $value)
    {
        $this->validate($value);

        $this->value = $value;
    }

    /**
     * @param string $value
     *
     * @return static
     */
    final public static function make(string $value)
    {
        $class = static::class;

        if (isset(self::$instances[$class][$value])) {
            return self::$instances[$class][$value];
        }

        $instance = new static($value);

        return self::$instances[$class][$value] = $instance;
    }

    /**
     * @param string $value
     */
    final public function validate(string $value): void
    {
        static $values;

        if (!$values) {
            $values = array_flip(static::getValues());
        }

        if (!isset($values[$value])) {
            $class = get_class($this);
            throw new InvalidArgumentException("Invalid value [{$value}] for [{$class}]");
        }
    }

    /**
     * @return string
     */
    final public function getValue(): string
    {
        return $this->value;
    }
}
