<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\explorer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historic extends Model
{
    use HasFactory;
    protected $fillable = [
        "explorer_id",
        "latitude",
        "longitude",
    ];
    public function historic():BelongsTo {
        return $this->belongsTo(explorer::class);
    }
}
