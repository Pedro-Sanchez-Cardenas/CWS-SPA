<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::create([
            'name' => 'Water Treatment',
            'user_created_at' => 1,
            //'user_updated_at' => 1,
        ]);
    }
}
