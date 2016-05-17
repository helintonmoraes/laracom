<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = [

            1 => [  'nome' => 'Helinton',
                    'email'=>'helinton.htsm@gmail.com',
                    'password'=>'12345',
                    'cart'=>0,
                    'compras'=>0
                    ],

        ];
        DB::table('users')->insert($user);
    }

}
