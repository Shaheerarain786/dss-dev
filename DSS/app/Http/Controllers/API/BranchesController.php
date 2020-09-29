<?php

namespace App\Http\Controllers\API;

use App\Branch;
use App\BranchDevices;
use App\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function branches(){
        $branches = Branch::all();

        foreach ($branches as $branch){
            $get_branch_id = BranchDevices::where('branch_id',$branch->id)->get(['device_id']);
            $branch->devices = $get_branch_id;
            foreach ($get_branch_id as $devices)
            {
                $devices->device_name = Device::find($devices->device_id)->device_name;
            }
        }
        return response()->json([
            'data' => $branches,
            'status' => true
        ]);
    }
}
