<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(
            function($user){
                $user->account()->create([
                    'user_id' => $user->id,
                    'first_name' => request()->first_name,
                    'last_name' => request()->last_name,
                    'date_of_birth' => request()->date_of_birth,
                    'gender' => request()->gender,
                    'phone_number' => request()->phone_number,
                ]);

                $user->billingInformation()->create([
                    'user_id' => $user->id
                ]);

                $user->mailing()->create([
                    'user_id' => $user->id
                ]);
            }
        );

        /*static::created(
            function ($user){
                $user->billingInformation()->create([
                    'user_id' => $user->id
                ]);
            }
        );

        static::created(
            function ($user){
                $user->mailing()->create([
                    'user_id' => $user->id
                ]);
            }
        );*/
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function billingInformation()
    {
        return $this->hasOne(BillingInformation::class);
    }

    public function mailing()
    {
        return $this->hasOne(MailingInformation::class);
    }


    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /*public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }*/

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
     public function getJWTCustomClaims()
    {
        return [];
    }


}
