<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plant::create([
            'name' => 'IBEROSTAR ROSE HALL',
            'location' => 'Montego Bay',
            'countries_id' => '3',
            'currencies_id' => '2',
            //'cover_path', // nullable
            //'installed_capacity',
            'cisterns_quantity' => '2',
            'plant_types_id' => '1',
            //'design_limit',

            'irrigation' => 'yes',
            //'sdi', // DEFAULT
            //'chloride', // DEFAULT
            //'well_pump', // DEFAULT
            //'feed_pump', // DEFAULT
            'boosterc' => 'yes',
            'companies_id' => '1',

            'attendant' => '5',
            'manager' => '4',
            'user_created_at'  => '1',
            //'user_updated_at' // NULLABLE
        ]);

        Plant::create([
            'name' => 'SECRETS',
            'location' => 'Playa del Carmen, Quintana Roo',
            'countries_id' => '1',
            'currencies_id' => '2',
            //'cover_path', // nullable
            //'installed_capacity',
            'cisterns_quantity' => '2',
            'plant_types_id' => '1',
            //'design_limit',

            //'irrigation', // DEFAULT
            'sdi' => 'yes', // DEFAULT
            'chloride' => 'yes', // DEFAULT
            'well_pump' => 'yes', // DEFAULT
            //'feed_pump', // DEFAULT
            //'boosterc', // DEFAULT
            'companies_id' => '2',

            'attendant' => '7',
            //'manager' => '4',
            'user_created_at'  => '1',
            //'user_updated_at' // NULLABLE
        ]);

        Plant::create([
            'name' => 'MOON PALACE JAMAICA',
            'location' => 'Ocho Ríos',
            'countries_id' => '3',
            'currencies_id' => '2',
            //'cover_path', // nullable
            //'installed_capacity',
            'plant_types_id' => '1',
            //'design_limit',

            'irrigation' => 'yes', // DEFAULT
            'sdi' => 'yes', // DEFAULT
            'chloride' => 'yes', // DEFAULT
            'well_pump' => 'yes', // DEFAULT
            'feed_pump' => 'yes', // DEFAULT
            //'boosterc', // DEFAULT
            'companies_id' => '1',

            'attendant' => '6',
            'manager' => '4',
            'user_created_at'  => '1',
            //'user_updated_at' // NULLABLE
        ]);

        Plant::create([
            'name' => 'TEST',
            'location' => 'Ocho Ríos',
            'countries_id' => '3',
            'currencies_id' => '2',
            //'cover_path', // nullable
            //'installed_capacity',
            'plant_types_id' => '1',
            //'design_limit',

            'irrigation' => 'yes', // DEFAULT
            'sdi' => 'yes', // DEFAULT
            'chloride' => 'yes', // DEFAULT
            'well_pump' => 'yes', // DEFAULT
            'feed_pump' => 'yes', // DEFAULT
            //'boosterc', // DEFAULT
            'companies_id' => '1',

            'attendant' => '6',
            'manager' => '4',
            'user_created_at'  => '1',
            //'user_updated_at' // NULLABLE
        ]);
    }
}
