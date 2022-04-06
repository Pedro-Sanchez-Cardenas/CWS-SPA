<?php

namespace Database\Seeders;


use App\Models\InvoiceStatus;
use Illuminate\Database\Seeder;

class InvoiceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceStatus::create([
            'name' => 'not processed'
        ]);
        InvoiceStatus::create([
            'name' => 'processed'
        ]);
        InvoiceStatus::create([
            'name' => 'verified'
        ]);
        InvoiceStatus::create([
            'name' => 'billed'
        ]);
        InvoiceStatus::create([
            'name' => 'partial payment'
        ]);
        InvoiceStatus::create([
            'name' => 'full payment'
        ]);
        InvoiceStatus::create([
            'name' => 'not payed'
        ]);
    }
}