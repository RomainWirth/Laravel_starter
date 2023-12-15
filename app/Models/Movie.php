<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function actors(): BelongsToMany {
        return $this->belongsToMany(Actor::class, 'movies_actors', 'movies_id', 'actors_id');
    }
}
