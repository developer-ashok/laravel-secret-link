<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'token',
        'secret_text',
        'password_hash',
        'expires_at',
        'viewed_at',
        'is_viewed',
    ];
}
