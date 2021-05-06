<?php

namespace App\Exports;

use App\Models\Comptes;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComptesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Comptes::all();
    }
}
