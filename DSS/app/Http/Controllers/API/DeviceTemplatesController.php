<?php

namespace App\Http\Controllers\API;

use App\Device;
use App\DeviceTemplates;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Controller;
use App\Log;
use App\ScheduleTemplates;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Psr7\try_fopen;

class DeviceTemplatesController extends Controller
{
    public function device_templates($id)
    {

        $devices_templates = DeviceTemplates::find($id);

        return response()->json([
            'data' => $devices_templates,
            'status' => true,
            'message' => 'Success'
        ]);
    }

    public function log(Request $request)
    {
        if (!$request->has('date_and_time')) {
            return response()->json([
                'status' => false,
                'message' => "date time field is required",
                'status_code' => 404
            ]);
        }

        $dt = $request->date_and_time;
        $checkDevice = Device::where('id', $request->id)->exists();

        if ($checkDevice == false) {
            return response()->json([
                'status' => false,
                'message' => "Device not found for this ID",
                'status_code' => 404
            ]);
        }

        if ($checkDevice == true) {

            $schedule_templates = ScheduleTemplates::where([
                ['device_id', '=' , $request->id], //"2020-09-15 14:50:00"
                ['start_date', '<=', $dt],
                ['end_date', '>=', $dt]
            ])->get();

            if (!empty($schedule_templates)) {
                return response()->json(['status' => true, 'message' => 'Scucessful', 'status_code' => 404, 'data' => null]);
            }
            return response()->json(['status' => true, 'message' => 'Successful', 'status_code' => 200, 'data' => $schedule_templates]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Empty object received',
                'status_code' => 404,
                'data' => null
            ]);
        }
    }
}
