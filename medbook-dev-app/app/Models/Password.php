<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    /**
     * The table name
     * 
     * @var string
     */
    protected $table ="passwords";

    /**
     * The primary key
     * 
     * @var string
     */
    protected $primaryKey = "psw_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "password", "user_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     "password"
    // ];

    /**
     * The relationship with the user
     * 
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'usr_id'
        );
    }
}
