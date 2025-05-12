<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $fillable = [
        'icon',
        'count',
        'title',
        'description',
    ];
}
