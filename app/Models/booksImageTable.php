<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class booksImageTable extends Model
{
    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(booksTable::class,'book_id');
    }
}
