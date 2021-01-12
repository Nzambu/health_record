<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * @var string $table Table name
     */
    protected $table = "tbl_patient";

    /**
     * @var string $primaryKey Primary key
     */
    protected $primaryKey = "ptn_id";

    /**
     * @var array $fillable attributes that are mass assignable
     */
    protected $fillable = [
        "gender_id",
        "service_id",
        "name",
        "dob",
        "comments"
    ];

    /**
     * Patient belongs to gender
     */
    public function gender()
    {
        return $this->belongsTo(
            Gender::class,
            'gender_id',
            'gnd_id'
        );
    }
    
    /**
     * Patient belongs to service
     */
    public function service()
    {
        return $this->belongsTo(
            Service::class,
            'service_id',
            'srv_id'
        );
    }
}
