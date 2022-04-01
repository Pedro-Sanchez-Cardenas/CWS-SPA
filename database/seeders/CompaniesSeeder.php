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
            'name' => 'CORP-CWS',
            'countries_id' => '1',
            //'services_id' => '1',
            'currencies_id' => '1'
        ]);

        Company::create([
            'name' => 'CWS-MEX',
            'countries_id' => '1',
            'services_id' => '1',
            'currencies_id' => '1'
        ]);

        Company::create([
            'name' => 'CWS-USA',
            'countries_id' => '2',
            'services_id' => '1',
            'currencies_id' => '2'
        ]);

        Company::create([
            'name' => 'KU3',
            'countries_id' => '3',
            'services_id' => '1',
            'currencies_id' => '3'
        ]);
    }
}
