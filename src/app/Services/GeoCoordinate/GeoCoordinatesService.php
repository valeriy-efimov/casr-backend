<?php

declare(strict_types=1);

namespace App\Services\GeoCoordinate;

use Illuminate\Contracts\Cache\Repository;
use Spatie\Geocoder\Geocoder;

class GeoCoordinatesService implements GeoCoordinatesServiceInterface
{
    /**
     * @var int
     */
    private int $expire;

    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    private Repository $cache;

    /**
     * @var \Spatie\Geocoder\Geocoder
     */
    private Geocoder $geocoder;

    /**
     * @param \Illuminate\Contracts\Cache\Repository $cache
     * @param \Spatie\Geocoder\Geocoder              $geocoder
     * @param int                                    $expire
     */
    public function __construct(
        Repository $cache,
        Geocoder $geocoder,
        int $expire
    ) {
        $this->cache    = $cache;
        $this->geocoder = $geocoder;
        $this->expire   = $expire;
    }


    /**
     * @param string $address
     *
     * @return array[
     *   'lat' => integer
     *   'lng' => integer
     * ]
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getCoordinates(string $address): array
    {
        $key         = md5(mb_strtolower($address));
        $coordinates = $this->cache->get($key);

        if (!isset($coordinates)) {
            $coordinates = $this->geocoder->getCoordinatesForAddress($address);
            $this->cache->put($key, $coordinates, $this->expire);
        }

        return $coordinates;
    }
}
