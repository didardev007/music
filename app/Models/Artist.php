<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    public $timestamps = false;

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function getName()
    {
        $locale = app()->getLocale();
        if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        } elseif ($locale == 'en') {
            return $this->name_en ?: $this->name;
        } else {
            return $this->name;
        }
    }
}
