<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    /**
     * @var string $table Table name
     */
    protected $table = "phones";

    /**
     * @var string $primaryKey Primary key
     */
    protected $primaryKey = "phn_id";

    /**
     * @var array $fillable attributes that are mass assignable
     */
    protected $fillable = [
        "user_id",
        "phone",
        "primary",
        "verified"
    ];

    /**
     * Return Belongs to relationship with user
     * 
     * @return mixed
     */
    public function user() { 
        return $this->belongsTo(
            User::class,
            'user_id',
            'usr_id'
        );
    }
}
