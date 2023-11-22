<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'date',
        'time',
    ];


    // scope for search
    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', '%' . $keyword . '%');
    }
}
