<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;

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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
