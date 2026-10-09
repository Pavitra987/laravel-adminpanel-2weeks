<?php

namespace App\Models;
use App\Models\booksTable;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books()
    {
        return $this->belongsToMany(booksTable::class,'author_book');
    }
}
