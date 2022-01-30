<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'CWS',
            'currencies_id' => '1',
            'countries_id' => '1'
        ]);

        Company::create([
            'name' => 'CWS USA',
            'currencies_id' => '2',
            'countries_id' => '2'
        ]);

        Company::create([
            'name' => 'KU3',
            'currencies_id' => '3',
            'countries_id' => '3'
        ]);
    }
}
