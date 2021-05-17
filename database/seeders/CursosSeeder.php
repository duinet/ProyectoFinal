<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CursosSeeder;
use App\Models\Cursos;

class CursosSeeder extends Seeder
{
    private $cursos = array(
        array(
            'curs' => 'Curs Any 2020',
            'estat' => 1,
            'usuari_id' => 1,
        ),
        array(
            'curs' => 'Curs Any 2021',
            'estat' => 1,
            'usuari_id' => 1,
        )
    );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach( $this->cursos as $curs )
        {
            $cu = new Cursos;
            $cu->curs = $curs['curs'];
            $cu->estat = $curs['estat'];
            $cu->usuari_id = $curs['usuari_id'];
            $cu->save();
        }
    }
}
