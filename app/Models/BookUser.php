<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_users');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_users');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    
}
