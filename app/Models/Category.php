<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //1. property 
    protected $fillable = [
         'category_name',
         'description'
    ];

    //2. contructor

    //3. method
}
