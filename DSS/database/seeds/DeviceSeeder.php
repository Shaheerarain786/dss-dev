<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deviceName = ['Device 1','Device 2','Device 3','Device 4'];
        $deviceNo = [
            '123456789',
            '123334789',
            '123453393',
            '1234333893'
        ];
        $deviceUID = ['dev-1101','dev-1201','dev-1103','dev-1102'];
        $deviceIP = ['192.168.1.110','192.168.1.112','192.168.1.109','192.168.1.100',];
        $deviceModel = ['Model 1','Model 2','Model 3','Model 4',];
        $deivceScreenHeight = ['10','10','10','10'];
        $deivceScreenWidth = ['5','5','5','5'];
        $deviceStorageMemory = ['1GB','1GB','1GB','1GB'];
        $deviceScreenResolution = ['1280 x 720','1280 x 720','1280 x 720','1280 x 720',];
        $branchID = [1,2,3,4];

        foreach ($deviceName as $key => $device)
        {
            $devices = new \App\Device();
            $devices->device_name = $device;
            $devices->device_group_id = $branchID[$key];
            $devices->device_uid = $deviceUID[$key];
            $devices->device_no = $deviceNo[$key];
            $devices->device_ip = $deviceIP[$key];
            $devices->device_model = $deviceModel[$key];
            $devices->device_description = "description";
            $devices->device_screen_height = $deivceScreenHeight[$key];
            $devices->device_screen_width = $deivceScreenWidth[$key];
            $devices->device_storage_memory = $deviceStorageMemory[$key];
            $devices->screen_resolution = $deviceScreenResolution[$key];

            $devices->save();
        }
    }
}
