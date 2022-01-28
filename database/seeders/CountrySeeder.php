<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'México',
            'taxes' => '16',
            'currencies_id' => '1',
            'user_created_at' => '1'
        ]);

        Country::create([
            'name' => 'Estados Unidos',
            'taxes' => '00',
            'currencies_id' => '2',
            'user_created_at' => '1'
        ]);

        Country::create([
            'name' => 'Jamaica',
            'taxes' => '15',
            'currencies_id' => '3',
            'user_created_at' => '1'
        ]);
    }
}
