<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public function product(){
        return $this->hasMany(Product::class, 'product_id');
    }
}
