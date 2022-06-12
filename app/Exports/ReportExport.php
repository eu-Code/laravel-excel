<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class ReportExport implements FromCollection, WithHeadings, WithCustomStartCell, ShouldAutoSize, WithStyles
{
    protected $reports;
    
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

    public function __construct($reports){
        $this->reports = $reports;
    }

    public function collection(){
        return $this->reports;
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 10,
            'D' => 15,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 20,
            'I' => 20,            
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
            2    => ['font' => ['bold' => true]],
        ];
    }
}
