<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'bullet_point',
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
