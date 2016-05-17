<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = [
        0=>[
            'login'=>'htsm',
            'senha'=>sha1('1234567890'),
            'nome'=>'Helinton Moraes',           
            'email'=>'helinton.moraes@hotmail.com',
            'cpf'=> '06387574951',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        ];
        DB::table('cliente')->insert($cliente);
    }
}
