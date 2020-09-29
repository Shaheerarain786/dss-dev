<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Device;
use App\DeviceGroup;
use App\Http\Controllers\Controller;
use App\Services\AssignDeviceGroup;
use Illuminate\Http\Request;

class DeviceGroupController extends Controller
{

    public function index()
    {
        $deviceGroups = DeviceGroup::with('devices')->get();

        $devices = Device::all();

        return view('admin.device_groups.index',compact('deviceGroups','devices'));
    }

    public function store(Request $request)
    {
        DeviceGroup::create($request->only('name'));

        return redirect('device-group')->with('success','Device Group created successfully');
    }

    public function edit(DeviceGroup $deviceGroup)
    {
        return view('admin.device_groups.edit', compact('deviceGroup'));
    }


    public function update(Request $request, $id)
    {
        $devieGroup = DeviceGroup::findOrFail($id);

        $devieGroup->update($request->only('name'));

        return redirect('device-group')->with('success','Device group updated successfully');
    }


    public function destroy($id)
    {
        //
    }

    public function assign(Request $request, AssignDeviceGroup $assignDeviceGroup){

        $assignDeviceGroup->assignDeviceGroup($request->all());

        return redirect('device-group')->with('success','Device Group assigned to devices successfully');
    }
}
