<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\City;
use App\Device;
use App\DeviceGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssignBranchesToCityRequest;
use App\Http\Requests\BranchRequest;
use App\Services\AssignBranchesToCities;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::with(['device_group'])->get();

        $device_groups = DeviceGroup::all();

        return view('admin.branches.index',compact('branches','device_groups'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(BranchRequest $request)
    {
        Branch::create($request->all());

        return redirect('branches')->with("success","Branch: " . $request->branch_name . "created successfully" );
    }

    public function edit(Branch $branch, $id)
    {
        return view('admin.branches.edit',compact('branch','devices'));
    }


    public function update(BranchRequest $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $branch->update($request->all());

        return redirect('branches')->with('success','Branch: ' . $branch->branch_name . "updated successfully");
    }


    public function destroy(Branch $branch)
    {
        Branch::findOrFail($branch->id)->delete();

        return redirect('branches')->with('success','Branch deleted successfully');

    }

    public function assign_branch(AssignBranchesToCityRequest $request, AssignBranchesToCities $assignBranchesToCitiesService){

        $assignBranchesToCitiesService->assignBranchesToCity($request);

        return redirect('branches')->with('success','Citi Assigned to branches successfully');
    }

}
