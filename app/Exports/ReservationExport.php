<?php

namespace App\Exports;

use App\tempReps;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ReservationExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tempReps::all();
    }
    public function headings(): array
    {
        return [
            'No.',
            'Guest',
            'Res.Date',
            'Accommodation',
            'Night',
            'Room Qty',
            'Ammount',
            'Status',
            
        ];
    }
}
