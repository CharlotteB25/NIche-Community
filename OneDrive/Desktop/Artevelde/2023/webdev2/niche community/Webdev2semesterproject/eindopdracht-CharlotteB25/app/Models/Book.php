<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function posts()

    {
        return $this->hasMany(Post::class);
    }
}