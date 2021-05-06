<?php

namespace App\Exports;

use App\Models\Pagaments;
use Maatwebsite\Excel\Concerns\FromCollection;

class PagamentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pagaments::all();
    }
}
