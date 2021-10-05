<?php

namespace Database\Factories;

use App\Enum\StatusEnum;
use App\Models\Client\Client;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id'           => Client::factory(),
            'email'               => $this->faker->unique()->safeEmail(),
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name'          => $this->faker->firstName,
            'last_name'           => $this->faker->lastName,
            'phone'               => $this->faker->phoneNumber,
            'status'              => StatusEnum::active(),
            'last_password_reset' => Carbon::now(),
        ];
    }
}
