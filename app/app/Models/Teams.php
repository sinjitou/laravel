<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Teams extends Model
{
    use HasFactory;

    /**
     * Relations avec Users
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }


    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
