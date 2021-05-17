<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ComptesSeeder;
use App\Models\Comptes;

class ComptesSeeder extends Seeder
{
    private $comptes = array(
        array(
            'compte' => 'compte 1',
            'fuc' => 123456789,
            'clau' => 'w4exrctbyuiompkmnjhbgvyfct',
            'estat' => 1,
            'usuari_id' => 1,
        ),
        array(
            'compte' => 'compte 2',
            'fuc' => 987654321,
            'clau' => 'zw4excrtfvygubhinjmoknhbg',
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
        foreach( $this->comptes as $compte )
        {
            $co = new Comptes;
            $co->compte = $compte['compte'];
            $co->fuc = $compte['fuc'];
            $co->clau = $compte['clau'];
            $co->estat = $compte['estat'];
            $co->usuari_id = $compte['usuari_id'];
            $co->save();
        }
    }
}
