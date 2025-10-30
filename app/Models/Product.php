<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_description',
        'product_qty',
        'product_price',
        'category_id',
        'product_image',
    ];

}
