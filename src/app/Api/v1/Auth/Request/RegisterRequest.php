<?php

declare(strict_types=1);

namespace App\Api\v1\Auth\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class RegisterRequest extends FormRequest
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
            'zipCode'                   => ['nullable', 'string', 'max:20'],
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
}
