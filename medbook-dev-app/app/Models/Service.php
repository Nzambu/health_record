<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * @var string $table Table name
     */
    protected $table = "tbl_service";

    /**
     * @var string $primaryKey Primary key
     */
    protected $primaryKey = "srv_id";

    /**
     * Service has many patients
     */
    public function patient()
    {
        return $this->hasMany(
            Patient::class,
            'service_id',
            'srv_id'
        );
    }
}
