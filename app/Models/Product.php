<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'subcat_id',
        'brand_id',
        'product_name',
        'slug',
        'product_code',
        'quantity',
        'short_des',
        'long_des',
        'tags',
        'color',
        'size',
        'selling_price',
        'discount_price',
        'image',
        'hot_deals',
        'special_offer',
        'special_deals',
        'featured',
        'vendor_id',
        'status'
    ];
}
