<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StockMovementType;

class StockMovementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['type' => 'Entrée', 'value' => 1],
            ['type' => 'Sortie', 'value' => -1],
        ];

        foreach ($types as $type) {
            StockMovementType::firstOrCreate(
                ['type' => $type['type']],
                ['value' => $type['value']]
            );
        }
    }
}
