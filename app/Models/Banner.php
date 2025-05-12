<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'button_text',
        'button_link',
        'image'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($banner) {
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
        });

        static::updating(function ($banner) {
            if ($banner->isDirty('image')) {
                $oldImage = $banner->getOriginal('image');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
