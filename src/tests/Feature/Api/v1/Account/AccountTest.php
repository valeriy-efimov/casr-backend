<?php

namespace Tests\Feature\Api\v1\Account;

use App\Models\User\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAccount()
    {
        User::factory()->count(10)->make();

        $response = $this->get(route('api.v1.account.index'));

        $response->assertOk()->assertJsonStructure(
            [
                'data'  => [
                    '*' => [
                        'id',
                        'name',
                        'address1',
                        'address2',
                        'city',
                        'state',
                        'country',
                        'zipCode',
                        'latitude',
                        'longitude',
                        'phoneNo1',
                        'phoneNo2',
                        'startValidity',
                        'endValidity',
                        'status',
                        'createdAt',
                        'updatedAt',
                    ],
                ],
                'links' => [
                    'path',
                    'firstPageUrl',
                    'lastPageUrl',
                    'nextPageUrl',
                    'prevPageUrl',
                ],
                'meta'  => [
                    'currentPage',
                    'from',
                    'lastPage',
                    'perPage',
                    'to',
                    'total',
                    'count',
                ],
            ])->assertJsonCount(10, 'data');
    }
}
