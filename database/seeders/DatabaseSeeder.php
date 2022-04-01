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
            RolesSeeder::class,
            ServicesSeeder::class,
            CompaniesSeeder::class,
            UsersSeeder::class,
            PlantTypeSeeder::class,
            PersonalitationPlantsSeeder::class,
            PlantsSeeder::class,
            PolishFiltersSeeder::class,
            MembraneSeeder::class,
            TrainsSeeder::class
        ]);
    }
}
