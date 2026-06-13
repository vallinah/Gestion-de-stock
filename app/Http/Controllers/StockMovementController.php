<?php
namespace App\Http\Controllers;

use App\Models\StockMovement;
use App\Models\StockMovementType;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\StockService;

class StockMovementController extends Controller
{
    public function index()
    {
        return Inertia::render('StockMovements/Index', [
            'movements' => StockMovement::with(['product', 'type'])
                ->latest()
                ->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('StockMovements/Create', [
            'products' => Product::all(),
            'types' => StockMovementType::all()
        ]);
    }

    public function store(Request $request, StockService $stockService)
{
    $request->validate([
        'product_id' => 'required',
        'stock_movement_type_id' => 'required',
        'quantity' => 'required|integer|min:1',
        'stock_movements_date' => 'required'
    ]);

    $product = Product::findOrFail($request->product_id);

    try {
        $stockService->checkStock(
            $product,
            $request->quantity,
            $request->stock_movement_type_id
        );
    } catch (\Exception $e) {
        return back()->withErrors([
            'quantity' => $e->getMessage()
        ]);
    }

    StockMovement::create($request->all());

    return redirect()->route('stock-movements.index');
}
}