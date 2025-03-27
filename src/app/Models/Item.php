<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [ 
        "name",
        "explorer_id",
        "latitude",
        "longitude",
        "price",
    ];
    public function explorer():BelongsTo
    {
        return $this->belongsTo(explorer::class);
    }
}
