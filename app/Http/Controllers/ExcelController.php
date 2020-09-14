<?php

namespace App\Http\Controllers;
use App\Category;

use App\Exports\CategoryExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
     public function categories()
    {
        return Excel::download(new CategoryExport(), 'categories.xlsx');
    }
}


