<?php

declare(strict_types=1);

namespace App\Api\v1\Account\Request;

use App\Enum\SortClientEnum;
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
            'page'     => ['nullable', 'integer'],
            'name'     => ['nullable', 'string', 'max:100'],
            'address1' => ['nullable', 'string', 'max:255'],
            'address2' => ['nullable', 'string', 'max:255'],
            'city'     => ['nullable', 'string', 'max:100'],
            'state'    => ['nullable', 'string', 'max:100'],
            'country'  => ['nullable', 'string', 'max:100'],
            'zipCode'  => ['nullable', 'string', 'max:20'],
            'phoneNo1' => ['nullable', 'min:8', 'max:20'],
            'phoneNo2' => ['nullable', 'min:8', 'max:20'],
            'status'   => ['nullable', new EnumIn(StatusEnum::class)],
            'sort'     => ['nullable', new EnumIn(SortClientEnum::class)],
            'order'    => ['string', 'in:asc,desc'],
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
     * @return \App\Enum\SortClientEnum|null
     */
    public function getSort(): ?SortClientEnum
    {
        $type = $this->input('sort');

        return isset($type) ? SortClientEnum::make($type) : null;
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->input('order', 'asc');
    }
}
