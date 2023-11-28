<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected  $fillable = [
        'title',
        'content',
        'thumbnail',
        'author',
        'tags',
    ];


    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('tags', 'LIKE', '%' . $keyword . '%');
    }
}
