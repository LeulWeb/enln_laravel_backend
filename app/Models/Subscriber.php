<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subscribed'
    ];



    // scope for search
    public function scopeSearch($query, $keyword)
    {
        return $query->where('email', 'LIKE', '%' . $keyword . '%');
    }
}
