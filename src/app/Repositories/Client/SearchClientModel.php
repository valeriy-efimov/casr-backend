<?php

declare(strict_types=1);

namespace App\Repositories\Client;

use App\Enum\SortClientEnum;
use App\Enum\StatusEnum;

interface SearchClientModel
{
    /**
     * @return int
     */
    public function getPage(): int;

    /**
     * @return string|null
     */
    public function getCountry(): ?string;

    /**
     * @return string|null
     */
    public function getCity(): ?string;

    /**
     * @return string|null
     */
    public function getClientName(): ?string;

    /**
     * @return string|null
     */
    public function getAddress1(): ?string;

    /**
     * @return string|null
     */
    public function getAddress2(): ?string;

    /**
     * @return string|null
     */
    public function getState(): ?string;

    /**
     * @return \App\Enum\StatusEnum|null
     */
    public function getStatus(): ?StatusEnum;

    /**
     * @return string|null
     */
    public function getZipCode(): ?string;

    /**
     * @return string|null
     */
    public function getPhoneNo1(): ?string;

    /**
     * @return string|null
     */
    public function getPhoneNo2(): ?string;

    /**
     * @return \App\Enum\SortClientEnum|null
     */
    public function getSort(): ?SortClientEnum;

    /**
     * @return string
     */
    public function getOrder(): string;
}
