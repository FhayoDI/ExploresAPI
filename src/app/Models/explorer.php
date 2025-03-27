<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class explorer extends Model
{
    use HasFactory;
    protected $fillable = [ 
        "name",
        "age",
        "latitude",
        "longitude",
    ];
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
    public function explorerHistory(): HasMany {
        return $this->hasMany (Historic::class);
    }
}