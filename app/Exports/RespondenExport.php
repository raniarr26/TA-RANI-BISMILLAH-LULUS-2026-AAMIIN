<?php

namespace App\Exports;

use App\Models\Responden;
use Maatwebsite\Excel\Concerns\FromCollection;

class RespondenExport implements FromCollection
{
    public function collection()
    {
        return Responden::all();
    }
}