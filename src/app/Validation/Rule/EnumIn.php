<?php

declare(strict_types=1);

namespace App\Validation\Rule;

use Illuminate\Validation\Rules\In;

class EnumIn extends In
{
    /**
     * @param string $enumClass
     */
    public function __construct(string $enumClass)
    {
        /** @var callable $callable */
        $callable  = [$enumClass, 'getNames'];
        $validKeys = call_user_func($callable);
        parent::__construct($validKeys);
    }
}
