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
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;



class ReportExport implements FromCollection, WithHeadings, WithCustomStartCell, ShouldAutoSize, WithStyles, WithDrawings
{
    protected $reports;
    protected $client;
    protected $brand;
    protected $period;
    /**
     * Export constructor
     */
    public function __construct($reports, $client, $brand, $period){
        $this->reports = $reports;
        $this->client = $client;
        $this->brand = $brand;
        $this->period = $period;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        $drawing1 = new Drawing();
        $drawing1->setName('Logo');
        $drawing1->setDescription('This is my logo');
        $drawing1->setPath(public_path('/img/logo2.png'));
        $drawing1->setHeight(90);
        $drawing1->setCoordinates('E1');

        return [$drawing, $drawing1];
    }
    
    public function headings(): array
    {
        return [
            ['Client', $this->client],
            ['Brand', $this->brand],
            ['Period', $this->period],
            ['Program Name',
            'Vendor',
            'Day',
            'Date',
            'Remark',
            'Duration',
            'Hour',
            'Campaign']
        ];
    }

   

    public function collection(){
        return $this->reports;
    }

    public function startCell(): string
    {
        return 'A6';
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
        $sheet->mergeCells('B6:H6');
        $sheet->mergeCells('A1:H5');
        $sheet->mergeCells('B7:H7');
        $sheet->mergeCells('B8:H8');
        $styleArray1 = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        $styleArray2 = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => '609e52',],
            ],
        ];
        $styleArray3 = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'c2c42b',],
            ],
        ];
        $sheet->getStyle('A1:H8')->applyFromArray($styleArray1);
        $sheet->getStyle('A6:H8')->applyFromArray($styleArray2);
        $sheet->getStyle('A9:H9')->applyFromArray($styleArray3);
        return [
            6    => ['font' => ['bold' => true]],
            7    => ['font' => ['bold' => true]],
            8    => ['font' => ['bold' => true]],
            9    => ['font' => ['bold' => true]],
        ];
    }
}
