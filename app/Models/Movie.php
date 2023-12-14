<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'name',
        'contenttype',
        'description',
        'contentrating',
        'genre',
        'poster',
        'formattedduration',
        'releaseddate',
        'actors',
        'director',
        'creator',
        'audio',
        'subtitle',
        'numberofseasons',
        'seasonstartdate',
        'genre_id'
    ];

    public function genre(): BelongsTo {
        return $this->belongsTo(Genre::class);
    }
}
