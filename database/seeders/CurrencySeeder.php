<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name' => 'Peso Mexicano',
            'abbreviation' => 'MXN',
            'value' => '0.050',
            'main_currency' => '0',
            'user_created_at' => '1',
        ]);

        Currency::create([
            'name' => 'Dólar Estadounidense',
            'abbreviation' => 'USD',
            'value' => '20.17',
            'main_currency' => '1',
            'user_created_at' => '1',
        ]);

        Currency::create([
            'name' => 'Dólar Jamaicano',
            'abbreviation' => 'JMD',
            'value' => '0.14',
            'main_currency' => '0',
            'user_created_at' => '1',
        ]);
    }
}
