<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'company',
        'location',
        'description',
        'user_id'
    ];

    public static function booted()
    {
        static::saving(function (Vacancy $vacancy) {
            if ($vacancy->isDirty('title')) {
                $vacancy->slug = Str::slug($vacancy->title);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
