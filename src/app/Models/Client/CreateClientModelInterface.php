<?php

declare(strict_types=1);

namespace App\Models\Client;

interface CreateClientModelInterface
{
    /**
     * @return string
     */
    public function getClientName(): string;

    /**
     * @return string
     */
    public function getAddress1(): string;

    /**
     * @return string
     */
    public function getAddress2(): string;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @return string
     */
    public function getState(): string;

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @return string
     */
    public function getZipCode(): string;

    /**
     * @return string
     */
    public function getPhoneNo1(): string;

    /**
     * @return string|null
     */
    public function getPhoneNo2(): ?string;
}
