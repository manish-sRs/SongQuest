<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $primaryKey = 'id';
    protected $fillable = ['rating', 'recommendation_id', 'user_id'];



    public function rating() : BelongsTo
    {
        return $this->belongsTo(Recommendation::class);
    }

}
