<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $table = 'books';
    protected $guarded = array('id'); # 予期せぬ代入を防ぐためのコード
    protected $fillable = [ "name","content","image" ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
