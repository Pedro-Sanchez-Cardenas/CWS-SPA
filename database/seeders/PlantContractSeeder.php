<?php

namespace Database\Seeders;

use App\Models\PlantContract;
use Illuminate\Database\Seeder;

class PlantContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlantContract::create([
            'plants_id' => '1',
            'user_created_at' => 1
            // Nullable
        ]);

        PlantContract::create([
            'plants_id' => '2',
            'user_created_at' => 1
            // Nullable
        ]);

        PlantContract::create([
            'plants_id' => '3',
            'user_created_at' => 1
            // Nullable
        ]);
    }
}
