<?php

namespace App\Models\User;

use App\CastsAttributes\StatusCast;
use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property-read int                     $id
 * @property-read int                     $client_id
 * @property string                       $first_name
 * @property string                       $last_name
 * @property string                       $email
 * @property string                       $password
 * @property string                       $phone
 * @property string                       $profile_uri
 * @property \App\Enum\StatusEnum         $status
 * @property \App\Models\Client\Client    $client
 * @property \Carbon\CarbonInterface|null $last_password_reset
 * @property \Carbon\CarbonInterface|null $created_at
 * @property \Carbon\CarbonInterface|null $updated_at
 * @property \Carbon\CarbonInterface|null $deleted_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'profile_uri',
        'status',
        'last_password_reset',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = [
        'status' => StatusCast::class,
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'last_password_reset',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function (User $model) {
                return "{$model->first_name} {$model->last_name}";
            })
            ->saveSlugsTo('profile_uri');
    }

//    /**
//     * Get the route key for the model.
//     *
//     * @return string
//     */
//    public function getRouteKeyName(): string
//    {
//        return 'profile_uri';
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
