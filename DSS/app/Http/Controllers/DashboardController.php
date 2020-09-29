<?php

namespace App\Http\Controllers;

use App\Branch;
use App\City;
use App\Device;
use App\DeviceGroup;
use App\Organization;
use App\Zone;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){

        $branches = Branch::all()->count();
        $organizations = Organization::all()->count();
        $zones = Zone::all()->count();
        $cities = City::all()->count();
        $devices = Device::all()->count();
        $deviceGroups = DeviceGroup::all()->count();

        Session::put('branches',$branches);
        Session::put('organization',$organizations);
        Session::put('zones',$zones);
        Session::put('cities',$cities);
        Session::put('devices',$devices);
        Session::put('device_groups',$deviceGroups);

        return view('admin.dashboard',compact('branches','organizations','zones','cities'));
    }
}
