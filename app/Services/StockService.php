<?php
namespace App\Services;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\StockMovementType;

class StockService
{
    public function checkStock(Product $product, int $quantity, int $typeId)
    {
        $stockIn = StockMovement::where('product_id', $product->id)
            ->whereHas('type', fn($q) => $q->where('value', 1))
            ->sum('quantity');

        $stockOut = StockMovement::where('product_id', $product->id)
            ->whereHas('type', fn($q) => $q->where('value', -1))
            ->sum('quantity');

        $currentStock = $stockIn - $stockOut;

        $type = StockMovementType::findOrFail($typeId);

        if ($type->value == -1 && $quantity > $currentStock) {
            throw new \Exception("Stock insuffisant. Disponible: $currentStock");
        }

        return true;
    }
}