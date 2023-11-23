<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;


    /*

            'title',
'content',
'date_published',
'reference',
'is_top',
'tags',
'thumbnail'

        */

    protected $fillable = [
        'title',
        'content',
        'date_published',
        'reference',
        'is_top',
        'tags',
        'thumbnail',
        'summary'
    ];

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', '%' . $keyword . '%');
    }


    // casting to array
    // protected $casts= [
    //     'tags'=>'array',
    //     'reference'=>'array'
    // ];
}
