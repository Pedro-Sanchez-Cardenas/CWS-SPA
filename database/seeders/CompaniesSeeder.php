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
            'name' => 'CWS'
        ]);

        Company::create([
            'name' => 'KU3'
        ]);

        Company::create([
            'name' => 'CWSS'
        ]);
    }
}
