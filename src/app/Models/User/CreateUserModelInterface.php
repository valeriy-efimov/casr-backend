<?php

declare(strict_types=1);

namespace App\Models\User;

interface CreateUserModelInterface
{
    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @return string
     */
    public function getPhone(): string;
}
