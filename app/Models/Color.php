<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'colors';
    // protected $fillable = ['name', 'hex_code'];

    // public function productVariants()
    // {
    //     return $this->hasMany(ProductVariant::class);
    // }
}