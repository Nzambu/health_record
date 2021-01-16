<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    /**
     * @var string $table Table name
     */
    protected $table = "emails";

    /**
     * @var string $primaryKey Primary key
     */
    protected $primaryKey = "eml_id";

    /**
     * @var array $fillable attributes that are mass assignable
     */
    protected $fillable = [
        "user_id",
        "email",
        "primary",
        "verified"
    ];

    /**
     * Return belongs relationship with user
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
