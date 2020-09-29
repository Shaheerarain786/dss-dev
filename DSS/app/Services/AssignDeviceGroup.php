<?php


namespace App\Services;

use App\Device;

class AssignDeviceGroup
{
    public function assignDeviceGroup($request)
    {
        $deviceGroupId = $request['name'];
        foreach ($request['device'] as $device)
        {
            $devices = Device::findOrFail($device);

            $devices->device_group_id = $deviceGroupId;
            $devices->save();
        }
    }
}
