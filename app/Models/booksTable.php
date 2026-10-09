<?php

namespace App\Models;
use App\Models\Author;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class booksTable extends Model
{
    use softdeletes;
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(booksImageTable::class,'book_id');
    }
    public function authors()
    {
        return $this->belongsToMany(Author::class,'author_book');
    }
}
