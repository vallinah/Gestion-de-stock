<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price'];

    public function priceHistories()
    {
        return $this->hasMany(ProductPriceHistory::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public function getStockAttribute()
    {
        return $this->stockMovements()
            ->join('stock_movement_types', 'stock_movements.stock_movements_type_id', '=', 'stock_movement_types.id')
            ->selectRaw('SUM(quantity * stock_movement_types.value) as stock')
            ->value('stock') ?? 0;
    }
}
