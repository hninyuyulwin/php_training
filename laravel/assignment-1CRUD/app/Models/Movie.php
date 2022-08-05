<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    
    protected $table="movies";

    protected $fillable = ['name','description','duration','genre_id'];

    public function genres()
    {
        return $this->belongsTo(Genre::class,'genre_id');
    }
}
