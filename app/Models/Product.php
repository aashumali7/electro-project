<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_desc',
        'unit_id',
        'brand_id',
        'category_id',
        'mrp',
        'sell_price',
        'qty_available',
        'prod_thumbnail_img',
        'prod_main_img',
    ];
}
