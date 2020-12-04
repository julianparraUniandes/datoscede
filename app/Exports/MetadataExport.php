<?php

namespace App\Exports;

use App\Metadata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MetadataExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
           ['Nombre base de datos', 'País', 'Cobertura', 'Fuente', 'Años' ]
          
        ];
    }
    public function collection()
    {
        return Metadata::select('name', 'pais', 'cobertura', 'fuente','ano_texto' )
                        ->where('publicada', '=', 1)
                        ->get();
    }
}
