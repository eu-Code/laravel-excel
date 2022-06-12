<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    
    public function headings(): array
    {
        return [
            'Program Name',
            'Vendor',
            'Day',
            'Date',
            'Remark',
            'Duration',
            'Hour',
            'Campaign'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
