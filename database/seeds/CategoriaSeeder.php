<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = [
              //Categorias Pai - Não podem ser alteradas//
            1=>[ 'nome' => 'Eletrodomesticos','id_pai' => 0,],
            2=>[ 'nome' => 'Games e Diversao','id_pai' => 0,],
            3=>[ 'nome' => 'Ferramentas','id_pai' => 0,],
            4=>[ 'nome' => 'Utensilios Domesticos','id_pai' => 0,],
            5=>[ 'nome' => 'Computadores e Notebooks','id_pai' => 0,],
            6=>[ 'nome' => 'TV, Áudio, Vídeo','id_pai' => 0,],
            7=>[ 'nome' => 'Celulares e Tablets','id_pai' => 0,],
            
            //Categorias Filho - Eletrodomesticos 1//
            8=>[ 'nome' => 'Geladeiras','id_pai' => 1,],
            9=>[ 'nome' => 'Fornos ou Microondas','id_pai' => 1,],
            
            //Categorias Filho - Games e Diversão 2//
            10=>[ 'nome' => 'Video-games','id_pai' => 2,],
            11=>[ 'nome' => 'Brinquedos','id_pai' => 2,],
            
            //Categorias Filho - Ferramentas 3//
            12=>[ 'nome' => 'Furadeiras','id_pai' => 3,],
            13=>[ 'nome' => 'Serras Elétricas','id_pai' => 3,],
            
            //Categorias Filho - Utensilios Domesticos 4//
            14=>[ 'nome' => 'Batedeiras','id_pai' => 4,],
            15=>[ 'nome' => 'Liquidificadores','id_pai' => 4,],
            
            
            //Categorias Filho - Computadores e Notebooks 5//
            16=>[ 'nome' => 'PC Desktop','id_pai' => 5,],
            17=>[ 'nome' => 'Notebooks','id_pai' => 5,],
            18=>[ 'nome' => 'Ultrabook','id_pai' => 5,],
            
            //Categorias Filho - TV, Áudio, Vídeo 6//
            19=>[ 'nome' => 'Smart TV','id_pai' => 6,],
            20=>[ 'nome' => 'DVD Player','id_pai' => 6,],
            
            //Categorias Filho - Smartphone e Tablets 7//        
            21=>[ 'nome' => 'Tablets','id_pai' => 7,],
            22=>[ 'nome' => 'Smartphones','id_pai' => 7,],
            23=>[ 'nome' => 'Celular Básico','id_pai' => 7,],
            
            //Categorias Filho - Utensilios Domesticos 4//
            24=>[ 'nome' => 'Panelas','id_pai' => 4,],
        ];
        DB::table('categoria')->insert($categoria);
    }
}
