<?php

declare(strict_types=1);

namespace App\Enum;

class SortClientEnum extends StringEnum
{
    /**
     * @var string
     */
    public const CLIENT_NAME = 'clientName';

    /**
     * @var string
     */
    public const ADDRESS_1 = 'address1';

    /**
     * @var string
     */
    public const ADDRESS_2 = 'address2';

    /**
     * @var string
     */
    public const CITY = 'city';

    /**
     * @var string
     */
    public const STATE = 'state';

    /**
     * @var string
     */
    public const COUNTRY = 'country';

    /**
     * @var string
     */
    public const PHONE_NO_1 = 'phoneNo1';

    /**
     * @var string
     */
    public const PHONE_NO_2 = 'phoneNo2';

    /**
     * @var string
     */
    public const ZIP = 'zip';

    /**
     * @return string[]
     */
    public static function getValues(): array
    {
        return [
            'client_name' => self::CLIENT_NAME,
            'address1'    => self::ADDRESS_1,
            'address2'    => self::ADDRESS_2,
            'city'        => self::CITY,
            'state'       => self::STATE,
            'country'     => self::COUNTRY,
            'phone_no1'   => self::PHONE_NO_1,
            'phone_no2'   => self::PHONE_NO_2,
            'zip'         => self::ZIP,
        ];
    }

    /**
     * @return string[]
     */
    public static function getNames(): array
    {
        return self::getValues();
    }
}
