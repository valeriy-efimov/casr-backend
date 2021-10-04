<?php

declare(strict_types=1);

namespace App\Models\Client;

use App\CastsAttributes\StatusCast;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read  int                       $id
 * @property string                          $client_name
 * @property string                          $address1
 * @property string                          $address2
 * @property string                          $city
 * @property string                          $state
 * @property string                          $country
 * @property float                           $latitude
 * @property float                           $longitude
 * @property string                          $phone_no1
 * @property string|null                     $phone_no2
 * @property string                          $zip
 * @property \App\Enum\StatusEnum            $status
 * @property \Illuminate\Support\Carbon      $start_validity
 * @property \Illuminate\Support\Carbon      $end_validity
 * @property \App\Models\User\User           $user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'client_name',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'latitude',
        'longitude',
        'phone_no1',
        'phone_no2',
        'zip',
        'status',
        'start_validity',
        'end_validity',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = [
        'status'         => StatusCast::class,
        'start_validity' => 'date:Y-m-d',
        'end_validity'   => 'date:Y-m-d',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'client_id');
    }
}
