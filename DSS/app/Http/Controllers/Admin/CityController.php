<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Requests\ExcelImportRequest;
use App\Services\ExcelImportService;
use App\Zone;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::with(['branches'])->get();

        $branches = Branch::all();

        return view('admin.cities.index', compact('cities','branches'));
    }

    public function store(CityRequest $request)
    {
        City::create($request->all());

        return back()->with('success','City created successfully');
    }

    public function edit(City $city)
    {
        $zones = Zone::all();

        return view('admin.cities.edit', compact('city','zones'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $city->update($request->all());

        return redirect('cities')->with('success','City updated Successfully');
    }

    public function destroy($id)
    {
        City::findOrFail($id)->delete();

        return redirect('cities')->with('success','Selected City deleted successfully');
    }

    public function import(ExcelImportRequest $request, ExcelImportService $excelImportService)
    {
        $excelImportService->generateExcelFilePath($request);

        return redirect('cities')->with('success','Cities Imported Successfully');
    }
}
