<?php
namespace App\Observers;

use App\Models\Product;
use App\Models\ProductPriceHistory;

class ProductObserver
{
    public function created(Product $product): void
    {
        ProductPriceHistory::create([
            'product_id' => $product->id,
            'price' => $product->price,
        ]);
    }

    public function updating(Product $product): void
    {
        if ($product->isDirty('price')) {
            ProductPriceHistory::create([
                'product_id' => $product->id,
                'price' => $product->price,
            ]);
        }
    }
}