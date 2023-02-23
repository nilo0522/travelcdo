<?php

namespace App\Exports;

use App\tempsalerep;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class salesreport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tempsalerep::all();
    }
     public function headings(): array
    {
        return [
            'ID',
            'Book Date.',
            'Guest',
            'Invoice',
            'Payment Method',
            'Total',
            'Amount Recieve',
            
            
        ];
    }
}
