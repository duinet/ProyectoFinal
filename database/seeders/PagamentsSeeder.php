<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PagamentsSeeder;
use App\Models\Pagaments;

class PagamentsSeeder extends Seeder
{
    private $pagaments = array(
        array(
            'categoria_id' => 1,
            'compte_id' => 1,
            'curs_id' => 1,
            'curs' => 'ESO',
            'pagament' => 'Excursio BCN Institud tecnologic',
            'descripcio' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'preu' => 20,
            'data_fi' => '2021-05-27',
            'estat' => 1,
            'usuari_id' => 1
        ),
        array(
            'categoria_id' => 1,
            'compte_id' => 1,
            'curs_id' => 1,
            'curs' => 'BAT',
            'pagament' => 'Excursio Tarragona museu',
            'descripcio' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'preu' => 20,
            'data_fi' => '2021-05-10',
            'estat' => 1,
            'usuari_id' => 1
        ),
        array(
            'categoria_id' => 1,
            'compte_id' => 1,
            'curs_id' => 1,
            'curs' => 'BAT',
            'pagament' => 'Excursio BCN Port',
            'descripcio' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'preu' => 20,
            'data_fi' => '2021-05-27',
            'estat' => 1,
            'usuari_id' => 1
        ),
        array(
            'categoria_id' => 2,
            'compte_id' => 2,
            'curs_id' => 2,
            'curs' => 'ESO',
            'pagament' => 'Taquilles de la 10-20',
            'descripcio' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'preu' => 20,
            'data_fi' => '2021-05-27',
            'estat' => 1,
            'usuari_id' => 1
        ),
        array(
            'categoria_id' => 2,
            'compte_id' => 2,
            'curs_id' => 2,
            'curs' => 'BAT',
            'pagament' => 'Taquilles de la 20-30',
            'descripcio' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'preu' => 20,
            'data_fi' => '2021-05-10',
            'estat' => 1,
            'usuari_id' => 1
        ),
        array(
            'categoria_id' => 2,
            'compte_id' => 2,
            'curs_id' => 2,
            'curs' => 'BAT',
            'pagament' => 'Taquilles de la 30-35',
            'descripcio' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'preu' => 20,
            'data_fi' => '2021-05-27',
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
        foreach( $this->pagaments as $pagament )
        {
            $pa = new Pagaments;
            $pa->categoria_id = $pagament['categoria_id'];
            $pa->compte_id = $pagament['compte_id'];
            $pa->curs_id = $pagament['curs_id'];
            $pa->curs = $pagament['curs'];
            $pa->pagament = $pagament['pagament'];
            $pa->descripcio = $pagament['descripcio'];
            $pa->preu = $pagament['preu'];
            $pa->data_fi = $pagament['data_fi'];
            $pa->estat = $pagament['estat'];
            $pa->usuari_id = $pagament['usuari_id'];
            $pa->save();
        }
    }
}
