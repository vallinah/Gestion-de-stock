<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'product_id',
        'stock_movement_type_id',
        'quantity',
        'stock_movements_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function type()
    {
        return $this->belongsTo(StockMovementType::class, 'stock_movement_type_id');
    }
}
