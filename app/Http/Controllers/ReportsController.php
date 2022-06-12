<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Exports\ReportExport;
use App\Http\Resources\ReportResource;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    //
    public function store(){

        Report::create([
            'program_name'=>'Fana Lamrot',
            'vendor'=>'Fana TV',
            'day'=>'Saturday',
            'date'=>'June 12, 2022',
            'remark'=>'Aired',
            'duration'=>'30 sec',
            'hour'=>'03:15 PM',
            'campaign'=>'Coop Ad'
        ]);

        return 'Report successfully stored';
    }

    public function export(){
        $export = new ReportExport(ReportResource::collection(Report::all()), 'Awash Bank', 'Mobile Banking', 'Aug 25, 2022 - Sep 15, 2022');
        return Excel::download($export, 'reports.xlsx');
    }
}
