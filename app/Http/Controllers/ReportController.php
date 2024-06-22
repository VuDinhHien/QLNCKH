<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CombinedCurriculumsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MagazinesArticlesExport;



class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function exportCombined()
    {
        return Excel::download(new CombinedCurriculumsExport, 'combined_report.xlsx');
    }

   
}