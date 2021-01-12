<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    /**
     * @var string $table Table name
     */
    protected $table = "tbl_gender";

    /**
     * @var string $primaryKey Primary key
     */
    protected $primaryKey = "gnd_id";
}
