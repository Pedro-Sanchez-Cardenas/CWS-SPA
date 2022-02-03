<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $domain = "@cwsmexico.mx";

        /* Super-Admin */
        User::create([
            'name' => 'Pedro Sánchez Cárdenas',
            'email' => 'ti' . $domain,
            'phone' => '9999708319',
            //'phone2' => '',
            'companies_id' => '1',
            'password' => Hash::make('Pedro41217'),
        ])->assignRole('Super-Admin');

        User::create([
            'name' => 'Eduardo Cardenas',
            'email' => 'ti2' . $domain,
            'phone' => '9992462785',
            //'phone2' => '',
            'companies_id' => '1',
            'password' => Hash::make('Eduardo41316'),
        ])->assignRole('Super-Admin');
        /* Super-Admin */

        /* Directors */
        User::create([
            'name' => 'Flavio Ulloa',
            'email' => 'fub' . $domain,
            'phone' => '9991633524',
            //'phone2' => '',
            //'companies_id' => '1',
            'password' => Hash::make('Flavio0412'),
        ])->assignRole('Director');

        User::create([
            'name' => 'Bernhard Kimpel',
            'email' => 'bmk' . $domain,
            'phone' => '9992714245',
            //'phone2' => '',
            //'companies_id' => '1',
            'password' => Hash::make('Bernhard0435'),
        ])->assignRole('Director');
        /* Directors */

        /* Administrations */
        User::create([
            'name' => 'Eduardo Losa Rubio',
            'email' => 'elr' . $domain,
            'phone' => '9992172904',
            //'phone2' => '',
            'companies_id' => '1',
            'password' => Hash::make('admin12'),
        ])->assignRole('Operations-Manager');

        User::create([
            'name' => 'Daniel Velázquez Velázquez',
            'email' => 'admon' . $domain,
            'phone' => '9993337523',
            //'phone2' => '',
            'companies_id' => '1',
            'password' => Hash::make('admin13'),
        ])->assignRole('Administrative-Manager');
        /* Administrations */

        /* Managers */
        User::create([
            'name' => 'Efrén Piña Acevedo',
            'email' => 'epina' . $domain,
            'phone' => '9981157757',
            //'phone2' => '',
            'companies_id' => '3',
            'password' => Hash::make('Laf01741'),
        ])->assignRole('Manager');
        /* Managers */

        /* Operators */
        User::create([
            'name' => 'Garland Prince',
            'email' => 'gprince' . $domain,
            'phone' => '876 386 1520',
            //'phone2' => '',
            'companies_id' => '3',
            'password' => Hash::make('gPrice4012'),
        ])->assignRole('Operator');

        User::create([
            'name' => 'Cedrick Dennis',
            'email' => 'cdennis' . $domain,
            'phone' => '876 403 0222',
            //'phone2' => '',
            'companies_id' => '3',
            'password' => Hash::make('cDennis1950'),
        ])->assignRole('Operator');

        User::create([
            'name' => 'Roger Caamal',
            'email' => 'rcaamal' . $domain,
            'phone' => '9983995987',
            //'phone2' => '',
            'companies_id' => '1',
            'password' => Hash::make('Rcaam4035'),
        ])->assignRole('Operator');
        /* Operators */
    }
}
