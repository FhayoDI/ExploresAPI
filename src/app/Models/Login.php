<?php

namespace App\Models;

use App\Policies\ExplorerPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Login extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "id,",
        "password",
    ];
    public function login(): HasOne
    {
        $user = $this->hasOne(Explorer::class);
    }
}
