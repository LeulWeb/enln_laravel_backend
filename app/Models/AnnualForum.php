<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualForum extends Model
{

    /*
        'title',
'content',
'image',
'location',
'event_date'

    */

    use HasFactory;

    protected $fillable=[
        'title',
        'content',
        'image',
        'location',
        'event_date'
    ];
}
