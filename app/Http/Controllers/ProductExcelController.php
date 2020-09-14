<?php
namespace App\Http\Controllers;
use App\Product;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductExcelController extends Controller
{
    public function products()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }
}
