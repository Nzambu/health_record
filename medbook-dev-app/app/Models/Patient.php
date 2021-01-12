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

}
