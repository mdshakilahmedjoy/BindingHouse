<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'cat_id', 'product_name', 'product_code', 'product_size','binding_cost', 'godaun_number', 'route_number', 'product_image'
    ];
}
