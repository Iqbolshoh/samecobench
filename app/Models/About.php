<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    protected $table = 'about'; 
    protected $fillable = ['title', 'text_1', 'text_2', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($about) {
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }
        });

        static::updating(function ($about) {
            if ($about->isDirty('image')) {
                $oldImage = $about->getOriginal('image');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
