<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            CurrencySeeder::class,
            CountrySeeder::class,
            CompaniesSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            PlantTypeSeeder::class,
            PlantsSeeder::class,
            PolishFiltersSeeder::class,
            TrainsSeeder::class,
            BillingPeriodSeeder::class,
            PlantContractSeeder::class,
            MembraneSeeder::class
        ]);
    }
}
