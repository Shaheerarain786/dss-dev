<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\BranchDevices;
use App\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DeviceController extends Controller
{

    public function index()
    {
        $devices = Device::with('branches')->get();

        return view('admin.devices.index', compact('devices'));
    }


    public function create()
    {
        $branches = Branch::all();

        $branches_count = Branch::all()->count();

        return view('admin.devices.create', compact('branches'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'device_name' => 'required',
            'device_no' => 'required',
            'device_ip' => 'required',
            'device_model' => 'required',
            'device_screen_height' => 'required',
            'device_screen_width' => 'required',
            'device_storage_memory' => 'required',
            'screen_resolution' => 'required',
            'branch_id' => 'required'
        ]);

        $device = new Device();
        $device->device_name = $request->device_name;
        $device->device_no = $request->device_no;
        $device->device_ip = $request->device_ip;
        $device->device_model = $request->device_model;
        $device->device_screen_height = $request->device_screen_height;
        $device->device_screen_width = $request->device_screen_width;
        $device->device_storage_memory = $request->device_storage_memory;
        $device->screen_resolution = $request->screen_resolution;
        $device->branch_id = $request->branch_id;
        $device->save();

//        if ($request->branch_id) {
//            foreach ($request->branch_id as $key => $branches) {
//                $branchDevices = new BranchDevices();
//                $branchDevices->branch_id = $branches;
//                $branchDevices->device_id = $device->id;
//                $branchDevices->save();
//            }
//        }

        return redirect('devices')->with('success', 'Device registered successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $devices = Device::find($id);

        if ($devices) {

            $branches = Branch::all();

            return view('admin.devices.edit', compact('devices', 'branches'));
        }
    }


    public function update(Request $request, $id)
    {
        $device = Device::find($id);
        $device->branch_id = $request->branch_id;
        $device->device_name = $request->device_name;
        $device->device_no = $request->device_no;
        $device->device_ip = $request->device_ip;
        $device->device_model = $request->device_model;
        $device->device_screen_height = $request->device_screen_height;
        $device->device_screen_width = $request->device_screen_width;
        $device->device_storage_memory = $request->device_storage_memory;
        $device->screen_resolution = $request->screen_resolution;
        $device->save();

        return redirect('devices')->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        if (isset($id)) {
            $device = Device::find($id);
            $device->delete();

            return redirect('devices')->with('Device Deleted Successfully');
        }
    }
}
