<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = ['name', 'name_ru'];

    public function tracks()
    {
        return $this->belongsToMany(Track::class);
    }
}
