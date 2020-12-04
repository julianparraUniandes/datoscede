<?php

namespace App\Exports;

use App\Descarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DescargasExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
           ['Nombre base de datos', 'Nombre Usuario', 'Apellido Usuario', 'Tipo de usuario', 'Email', 'Motivo', 'Fecha' ]
          
        ];
    }
    public function collection()
    {
        return Descarga::select('nombre_metadata', 'user_name', 'user_lastname','tipo_usr', 'user_email', 'motivo', 'created_at')
                        ->OrderBy('id', 'desc')
                        ->get();
    }
}
