<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recommendation extends Model
{
    use HasFactory;
    protected $table = 'recommendations';
    protected $primaryKey = 'id';
    protected $fillable = ['recommendation_name','recommendation_for','recommendation_1','recommendation_2','recommendation_3','description', 'user_id'];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
    
}
