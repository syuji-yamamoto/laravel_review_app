<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $guarded = array('id'); # 予期せぬ代入を防ぐためのコード

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
