<?php

namespace App\Services\GeoCoordinate;

interface GeoCoordinatesServiceInterface
{
    /**
     * @param string $address
     *
     * @return array[
     *   'lat' => integer
     *   'lng' => integer
     * ]
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getCoordinates(string $address): array;
}
