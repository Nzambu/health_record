<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The table name
     * 
     * @var string
     */
    protected $table ="users";

    /**
     * The primary key
     * 
     * @var string
     */
    protected $primaryKey = "usr_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "first_name", 
        "last_name", 
        "identity_type", 
        "identification_number", 
        "sex",  
        "email", 
        "password", 
        "terms"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "password", "remember_token",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
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
        return ["userID" => $this->usr_id];
    }

    /**
     * Return relationship instance with email
     * 
     * @return mixed
     */
    public function emails()
    {
        return $this->hasMany(
            Email::class,
            'user_id',
            'usr_id'
        );
    }

    /**
     * Return relationship instance with phone
     * 
     * @return mixed
     */
    public function phone()
    {
        return $this->hasMany(
            Phone::class,
            'user_id',
            'usr_id'
        );
    }

    /**
     * Return relationship instance with phone
     * 
     * @return mixed
     */
    public function password($userID)
    { 
        return Password::where('user_id', $userID)->orderBy('psw_id', 'DESC')->first();
    }

    /**
     * Return relationship instance with passwords
     * 
     * @return mixed
     */
    public function passwords() {
        return $this->hasMany(
            Password::class,
            'user_id',
            'usr_id'
        );
    }
}
