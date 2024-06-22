<?php

namespace App\Exports;

use App\Personalinfo;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonalinfoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Personalinfo::all();
    }
}
