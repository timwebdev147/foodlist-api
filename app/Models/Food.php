<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $fillable = [
        'food',
        'description',
        'cuisine',
        'dish-type',
        'p-ingredient',
        'image',
        'ingredient',
        'instructions',
        'prep-time',
        'cook-time'
    ];
 
}
