<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Plant 1
        Train::create([
            'plants_id' => '1',
            'capacity' => '700',
            'multimedia_filter_quantity' => '3',
            'polish_filters_types_id' => '10',
            'polish_filters_quantity' => '6',
            'tds' => '36000',
            'booster_quantity' => '2',
            // status => 'Enable',
            'membrane_active_area' => '1',
            'membrane_elements' => '90',
            'user_created_at' => '1'
        ]);

        Train::create([
            'plants_id' => '1',
            /*'capacity' => '700',
            'multimedia_filter_quantity' => '3',
            'polish_filters_types_id' => '10',
            'polish_filters_quantity' => '6',
            'tds' => '36000',
            'booster_quantity' => '2',
            status => 'Enable',*/
            'type' => 'Irrigation',
            'user_created_at' => '1'
        ]);

        Train::create([
            'plants_id' => '1',
            /*'capacity' => '700',
            'multimedia_filter_quantity' => '3',
            'polish_filters_types_id' => '10',
            'polish_filters_quantity' => '6',
            'tds' => '36000',
            'booster_quantity' => '2',
            status => 'Enable',*/
            'type' => 'Municipal',
            'user_created_at' => '1'
        ]);

        // Planta 2
        Train::create([
            'plants_id' => '2',
            'capacity' => '700',
            'multimedia_filter_quantity' => '2',
            'polish_filters_quantity' => '1',
            'polish_filters_types_id' => '5',
            'tds' => '36000',
            'booster_quantity' => '0',
            // status => 'Enable',
            'membrane_active_area' => '1',
            'membrane_elements' => '49',
            'user_created_at' => '1'
        ]);

        Train::create([
            'plants_id' => '2',
            'capacity' => '700',
            'multimedia_filter_quantity' => '2',
            'polish_filters_quantity' => '1',
            'polish_filters_types_id' => '5',
            'tds' => '36000',
            'booster_quantity' => '0',
            // status => 'Enable',
            'membrane_active_area' => '1',
            'membrane_elements' => '49',
            'user_created_at' => '1'
        ]);

        Train::create([
            'plants_id' => '2',
            /*'capacity' => '700',
            'multimedia_filter_quantity' => '3',
            'polish_filters_types_id' => '10',
            'polish_filters_quantity' => '6',
            'tds' => '36000',
            'booster_quantity' => '2',
            status => 'Enable',*/
            'type' => 'Municipal',
            'user_created_at' => '1'
        ]);

        // Planta 3
        Train::create([
            'plants_id' => '3',
            'capacity' => '700',
            'multimedia_filter_quantity' => '2',
            'polish_filters_quantity' => '3',
            'polish_filters_types_id' => '10',
            'tds' => '12000',
            'booster_quantity' => '0',
            // status => 'Enable',
            'membrane_active_area' => '1',
            'membrane_elements' => '42',
            'user_created_at' => '1'
        ]);

        Train::create([
            'plants_id' => '3',
            'capacity' => '700',
            'multimedia_filter_quantity' => '2',
            'polish_filters_quantity' => '3',
            'polish_filters_types_id' => '10',
            'tds' => '12000',
            'booster_quantity' => '0',
            // status => 'Enable',
            'membrane_active_area' => '1',
            'membrane_elements' => '42',
            'user_created_at' => '1'
        ]);

        Train::create([
            'plants_id' => '3',
            /*'capacity' => '700',
            'multimedia_filter_quantity' => '3',
            'polish_filters_types_id' => '10',
            'polish_filters_quantity' => '6',
            'tds' => '36000',
            'booster_quantity' => '2',
            // status => 'Enable',*/
            'type' => 'Municipal',
            'user_created_at' => '1'
        ]);
    }
}
