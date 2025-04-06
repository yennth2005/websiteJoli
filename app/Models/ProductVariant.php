<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'color_id', 'price', 'sale_price', 'stock'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //color
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}