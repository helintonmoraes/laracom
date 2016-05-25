<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
        0=>[
            'login'=>'master',
            'senha'=>sha1('1234567890'),
            'nome'=>'Helinton Moraes',           
            'email'=>'helinton.moraes@gmail.com',
            'cpf'=> '06387574951',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'ativacao'=>TRUE
           ],
        ];
        DB::table('admin')->insert($admin);
    }
}
