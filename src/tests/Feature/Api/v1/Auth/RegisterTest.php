<?php

namespace Tests\Feature\Api\v1\Auth;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $email    = $this->faker->email;
        $response = $this->post(route('api.v1.auth.register'), [
            'name'     => $this->faker->name,
            'address1' => $this->faker->address,
            'address2' => $this->faker->streetAddress,
            'city'     => $this->faker->city,
            'state'    => $this->faker->state,
            'country'  => $this->faker->country,
            'phoneNo1' => $this->faker->phoneNumber,
            'phoneNo2' => $this->faker->phoneNumber,
            'zipCode'  => $this->faker->postcode,
            'user'     => [
                'firstName'            => $this->faker->firstName,
                'lastName'             => $this->faker->lastName,
                'email'                => $email,
                'password'             => 'password1234',
                'passwordConfirmation' => 'password1234',
                'phone'                => $this->faker->phoneNumber,
            ],
        ]);

        $response->assertOk();
    }
}
