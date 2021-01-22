<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    // use HasFactory;

    /**
     * The table name
     * 
     * @var string
     */
    protected $table ="password_resets";

    /**
     * The primary key
     * 
     * @var string
     */
    protected $primaryKey = "psr_id";
}
