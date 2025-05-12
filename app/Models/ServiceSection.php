<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class ServiceSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text_1',
        'image',
        'sub_title',
        'text_2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($serviceSection) {
            if ($serviceSection->image && Storage::disk('public')->exists($serviceSection->image)) {
                Storage::disk('public')->delete($serviceSection->image);
            }
        });

        static::updating(function ($serviceSection) {
            if ($serviceSection->isDirty('image')) {
                $oldImage = $serviceSection->getOriginal('image');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
