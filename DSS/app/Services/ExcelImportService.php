<?php

namespace App\Services;

use App\Imports\CitiesImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportService {

    function generateExcelFilePath($request){
        
        if ($request->hasFile('excel_file')) {

            $file = $request->file('excel_file');

            $fileName = $file->getClientOriginalName();

            $path = public_path() . '/uploads/xls/';

            $file->move($path, $fileName);

            Excel::import(new CitiesImport, public_path() . '/uploads/xls/' . $fileName);
        }
    }
}
