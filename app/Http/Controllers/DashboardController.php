<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Client;
use App\Models\StockMovement;
use App\Models\StockMovementType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // 📦 total produits
        $totalProducts = Product::count();

        // 👤 total clients
        $totalClients = Client::count();

        // 📊 stock total (entrée - sortie)
        $stockIn = StockMovement::join('stock_movement_types', 'stock_movements.stock_movement_type_id', '=', 'stock_movement_types.id')
            ->where('stock_movement_types.value', 1)
            ->sum('stock_movements.quantity');

        $stockOut = StockMovement::join('stock_movement_types', 'stock_movements.stock_movement_type_id', '=', 'stock_movement_types.id')
            ->where('stock_movement_types.value', -1)
            ->sum('stock_movements.quantity');

        $stockTotal = $stockIn - $stockOut;

        // 📦 derniers mouvements
        $latestMovements = StockMovement::with(['product', 'type'])
            ->latest()
            ->take(5)
            ->get();

        return Inertia::render('Dashboard', [
            'stats' => [
                'products' => $totalProducts,
                'clients' => $totalClients,
                'stock' => $stockTotal,
            ],
            'movements' => $latestMovements
        ]);
    }
}