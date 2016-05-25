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
        1=>[
            'login'=>'juca',
            'senha'=>sha1('1234567890'),
            'nome'=>'Juca Bala',           
            'email'=>'juca.bala@hotmail.com',
            'cpf'=> '02919697803',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        2=>[
            'login'=>'maria',
            'senha'=>sha1('1234567890'),
            'nome'=>'Maria da Graça',           
            'email'=>'maria.graca@hotmail.com',
            'cpf'=> '39531131511',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        3=>[
            'login'=>'zeca',
            'senha'=>sha1('1234567890'),
            'nome'=>'Zeca da Graça',           
            'email'=>'zeca.graca@hotmail.com',
            'cpf'=> '74906686206',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        4=>[
            'login'=>'pedro',
            'senha'=>sha1('1234567890'),
            'nome'=>'Pedro Silva',           
            'email'=>'pedro.silva@gmail.com',
            'cpf'=> '49327243900',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        5=>[
            'login'=>'sabrina',
            'senha'=>sha1('1234567890'),
            'nome'=>'Sabrina Sales',           
            'email'=>'sabrina.sales@gmail.com',
            'cpf'=> '81122922566',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        6=>[
            'login'=>'carlos',
            'senha'=>sha1('1234567890'),
            'nome'=>'Carlos Silveira',           
            'email'=>'carlos.silveiras@gmail.com',
            'cpf'=> '32585695506',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        7=>[
            'login'=>'laura',
            'senha'=>sha1('1234567890'),
            'nome'=>'Laura Seixas',           
            'email'=>'laura.seixas@gmail.com',
            'cpf'=> '18703087948',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        8=>[
            'login'=>'paulo',
            'senha'=>sha1('1234567890'),
            'nome'=>'Paulo Dias',           
            'email'=>'paulo.dias@gmail.com',
            'cpf'=> '72320698639',
            'endereco'=>'Rua das Flores, 123 - 84033-060 - Ponta Grossa-Pr',
            'fone'=>'42-9904-7150',
            'saldo_pontos'=>900000,
            'pontos_usados'=>0,
            'pontos_total'=>900000,
            'ativacao'=>TRUE
           ],
        9=>[
            'login'=>'vera',
            'senha'=>sha1('1234567890'),
            'nome'=>'Vera Bach',           
            'email'=>'vera.bach@gmail.com',
            'cpf'=> '78950769301',
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
