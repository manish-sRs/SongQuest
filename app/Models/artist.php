<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class artist extends Model
{
    use HasFactory;
    protected $table = 'artists';
    protected $primaryKey = 'id';
    protected $fillable = ['artist_name'];

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'artist_song', 'artist_id', 'song_id');
    }
}
