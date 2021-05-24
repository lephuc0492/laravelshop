<?php

namespace App\Http\Controllers;
require 'vendor/autoload.php';

Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TestExcel extends Controller
{
	public function test_excel(Request $request)
	{
				$exc_load = $request->file('select_excel');
		if ($exc_load) 
		{
        $exc_load_filename = $exc_load->getclientoriginalName();
        $exc_load->move('public\excel', $exc_load_filename);
        $exc_load_dir = 'http://localhost/shop/public/excel/'.$exc_load_filename;
        //echo $exc_load_dir;
		}

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        // Load is Book1.xlsx ready
		$spreadsheet = $reader->load("public/excel/Book1.xlsx");
		// You can create new file excel
		// $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getSheetByName('Sheet2');
		$sheet->setCellValue('A1', 'Hello World !');
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		$writer->save('public/excel/Book12.xlsx');
		return view('Excel/testexcel');
	}
}
