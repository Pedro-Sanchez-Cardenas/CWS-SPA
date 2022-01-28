<?php

namespace Database\Seeders;

use App\Models\BillingPeriod;
use Illuminate\Database\Seeder;

class BillingPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BillingPeriod::create([
            'name' => 'Monthly'
        ]);

        BillingPeriod::create([
            'name' => 'Bimonthly'
        ]);

        BillingPeriod::create([
            'name' => 'Quarterly'
        ]);

        BillingPeriod::create([
            'name' => 'Biannual'
        ]);
    }
}
