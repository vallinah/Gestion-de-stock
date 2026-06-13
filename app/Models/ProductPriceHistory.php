<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPriceHistory extends Model
{
    protected $fillable = ['product_id', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
