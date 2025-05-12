<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'value',
        'link',
        'is_active',
    ];
}
