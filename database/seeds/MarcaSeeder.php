<?php

use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $marca = [
              
            1=>[ 'nome' => 'Panasonic'],
            2=>[ 'nome' => 'LG'],
            3=>[ 'nome' => 'Eletrolux'],
            4=>[ 'nome' => 'Sony'],
            5=>[ 'nome' => 'Samsumg'],
            6=>[ 'nome' => 'CCE'],

        ];
        DB::table('marca')->insert($marca);
    }
}
