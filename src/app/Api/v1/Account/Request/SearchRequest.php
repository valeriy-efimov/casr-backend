<?php

declare(strict_types=1);

namespace App\Api\v1\Account\Request;

use App\Enum\StatusEnum;
use App\Repositories\Client\SearchClientModel;
use App\Validation\Rule\EnumIn;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest implements SearchClientModel
{
    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'page'           => ['nullable', 'integer'],
            'name'           => ['nullable', 'string', 'max:100'],
            'address1'       => ['nullable', 'string', 'max:65535'],
            'address2'       => ['nullable', 'string', 'max:65535'],
            'city'           => ['nullable', 'string', 'max:100'],
            'state'          => ['nullable', 'string', 'max:100'],
            'country'        => ['nullable', 'string', 'max:100'],
            'zipCode'        => ['nullable', 'string', 'max:20'],
            'phoneNo1'       => ['nullable', 'min:8', 'max:20'],
            'phoneNo2'       => ['nullable', 'min:8', 'max:20'],
            'status'         => ['nullable', new EnumIn(StatusEnum::class)],
            'user.firstName' => ['nullable', 'string', 'max:50'],
            'user.lastName'  => ['nullable', 'string', 'max:50'],
            'user.phone'     => ['nullable', 'min:8', 'max:20'],
        ];
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return (int)$this->input('page', 1);
    }

    /**
     * @return string|null
     */
    public function getClientName(): ?string
    {
        return $this->input('name');
    }

    /**
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->input('address1');
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->input('address2');
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->input('city');
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->input('state');
    }

    /**
     * @return \App\Enum\StatusEnum|null
     */
    public function getStatus(): ?StatusEnum
    {
        $type = $this->input('type');

        return isset($type) ? StatusEnum::make($type) : null;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->input('country');
    }

    /**
     * @return string|null
     */
    public function getZipCode(): ?string
    {
        return $this->input('zipCode');
    }

    /**
     * @return string|null
     */
    public function getPhoneNo1(): ?string
    {
        return $this->input('phoneNo1');
    }

    /**
     * @return string|null
     */
    public function getPhoneNo2(): ?string
    {
        return $this->input('phoneNo2');
    }


    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->input('user.firstName');
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->input('user.lastName');
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->input('user.email');
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->input('user.password');
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->input('user.phone');
    }
}
