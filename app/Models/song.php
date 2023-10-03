<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $primaryKey = 'id';
    protected $fillable = ['title','album', 'genre_id', 'year'];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(artist::class, 'artist_song', 'song_id', 'artist_id');
    }

        // For easier access of recomendation:
    public function recommendations_for() 
    {
        return $this->hasMany(Recommendation::class, 'recommendation_for', 'id');
    }

    public function recommendations_1() 
    {
        return $this->hasMany(Recommendation::class, 'recommendation_1', 'id');
    }

    public function recommendations_2() 
    {
        return $this->hasMany(Recommendation::class, 'recommendation_2', 'id');
    }

    public function recommendations_3() 
    {
        return $this->hasMany(Recommendation::class, 'recommendation_3', 'id');
    }

}
