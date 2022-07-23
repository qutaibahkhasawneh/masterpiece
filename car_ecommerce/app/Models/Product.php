<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_name',
        'product_description',
        'product_price',
        'product_img',
        'product_price_on_sale',
        'product_quantity',
        'category_id',
        'product_feature'];
}
