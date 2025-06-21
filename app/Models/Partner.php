<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name', 'license_key', 'allowed_areas', 'currency_sign'
    ];

    protected $casts = [
        'allowed_areas' => 'array', // if you store JSON
    ];
}