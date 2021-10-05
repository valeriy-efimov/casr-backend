<?php

declare(strict_types=1);

namespace App\Api\v1\Auth\Request;


use App\Models\Client\CreateClientModelInterface;
use App\Models\User\CreateUserModelInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class RegisterRequest extends FormRequest implements CreateUserModelInterface, CreateClientModelInterface
{
    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'name'                      => ['required', 'string', 'max:100'],
            'address1'                  => ['required', 'string', 'max:65535'],
            'address2'                  => ['required', 'string', 'max:65535'],
            'city'                      => ['required', 'string', 'max:100'],
            'state'                     => ['required', 'string', 'max:100'],
            'country'                   => ['required', 'string', 'max:100'],
            'zipCode'                   => ['required', 'string', 'max:20'],
            'phoneNo1'                  => ['required', 'min:8', 'max:20'],
            'phoneNo2'                  => ['required', 'min:8', 'max:20'],
            'user.firstName'            => ['required', 'string', 'max:50'],
            'user.lastName'             => ['required', 'string', 'max:50'],
            'user.email'                => ['required', 'email', new Unique('users', 'email'), 'max:150'],
            'user.password'             => ['required', 'min:8', 'max:256'],
            'user.passwordConfirmation' => ['required', 'same:user.password'],
            'user.phone'                => ['required', 'min:8', 'max:20'],
        ];
    }

    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->input('name');
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->input('address1');
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->input('address2');
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->input('city');
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->input('state');
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->input('country');
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->input('zipCode');
    }

    /**
     * @return string
     */
    public function getPhoneNo1(): string
    {
        return $this->input('phoneNo1');
    }

    /**
     * @return string
     */
    public function getPhoneNo2(): string
    {
        return $this->input('phoneNo2');
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->input('user.firstName');
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->input('user.lastName');
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->input('user.email');
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->input('user.password');
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->input('user.phone');
    }
}
