<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //1. property 
    protected $fillable = [
         'category_id',
         'category_name',
         'description',
         'picture'
    ];

    //2. contructor
    protected $primaryKey = 'category_id';

    //3. method
}
