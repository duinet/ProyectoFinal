<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesSeeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    private $categorias = array(
        array(
            'categoria' => 'Excursions',
            'estat' => 1,
            'usuari_id' => 1
        ),
        array(
            'categoria' => 'Taquilles',
            'estat' => 1,
            'usuari_id' => 1
        )
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach( $this->categorias as $categoria )
        {
            $ca = new Categories;
            $ca->categoria = $categoria['categoria'];
            $ca->estat = $categoria['estat'];
            $ca->usuari_id = $categoria['usuari_id'];
            $ca->save();
        }
    }
}
