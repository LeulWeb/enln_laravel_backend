<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    /*
        'title',
'author',
'content',
'published_date',
'pdf',
'youtube_link',
'category',
'thumbnail'

    */

    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'content',
        'published_date',
        'pdf',
        'youtube_link',
        'category',
        'thumbnail',
    ];

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', '%' . $keyword . '%');
    }
}
