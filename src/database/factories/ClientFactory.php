<?php

namespace Database\Factories;

use App\Enum\StatusEnum;
use App\Models\Client\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = Carbon::now();

        return [
            'client_name'    => $this->faker->name,
            'address1'       => $this->faker->address,
            'address2'       => $this->faker->streetAddress,
            'city'           => $this->faker->city,
            'state'          => $this->faker->state,
            'country'        => $this->faker->country,
            'latitude'       => $this->faker->latitude,
            'longitude'      => $this->faker->longitude,
            'phone_no1'      => $this->faker->phoneNumber,
            'phone_no2'      => $this->faker->phoneNumber,
            'zip'            => $this->faker->postcode,
            'start_validity' => $now,
            'end_validity'   => $now->addDays(15),
            'status'         => StatusEnum::active(),
        ];
    }
}
