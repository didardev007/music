<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

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