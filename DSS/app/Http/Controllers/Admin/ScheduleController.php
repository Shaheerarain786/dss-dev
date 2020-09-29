<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\DeviceTemplates;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchedulePostRequest;
use App\ScheduleTemplates;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        $branches = Branch::with('devices')->get();

        $schedule = ScheduleTemplates::with('devices')->get();

        return view('admin.schedule.index', compact('branches', 'schedule'));
    }

    public function schedule()
    {
        $branches = Branch::with('devices')->get();

        $data = json_encode($branches);

        return $data;
    }

    public function schedule_post(Request $request, SchedulePostRequest $schedulePostRequest)
    {
        if (!isset($request->devices)) {
            return response()->json([
                'status' => false,
                'message' => "Select at least 1 device"
            ]);
        }

        $start_time = date("H:i:s", strtotime($request->start_time));
        $end_time = date("H:i:s", strtotime($request->end_time));
        $devices = $request->devices;
        $explode_devices = explode(',', $devices);
        $filter_devices = array_filter($explode_devices);

        $validation_check = $this->validateFields($request->start_date, $request->end_date, $start_time, $end_time, $filter_devices);
        if ($validation_check == false) {
            return response()->json([
                'status' => false,
                'message' => "Device Already Scheduled to this date, Please change the date or time"
            ]);
        }

        if ($request->hasFile('logo') && $request->hasFile('video')) {

            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $path = public_path() . '/uploads/photos';
            $file->move($path, $fileName);
            $photoPath = '/uploads/photos/' . $fileName;

            $file = $request->file('video');
            $fileName = $file->getClientOriginalName();
            $path = public_path() . '/uploads/photos';
            $file->move($path, $fileName);
            $videoPath = '/uploads/photos/' . $fileName;

            foreach ($filter_devices as $key => $dev) {
                $schedule = new ScheduleTemplates();
                $schedule->device_id = $dev;
                $schedule->title = $request->title;
                $schedule->start_date = $request->start_date . " " . $start_time;
                $schedule->end_date = $request->end_date . " " . $end_time;
                $schedule->logo = $photoPath;
                $schedule->video = $videoPath;
                $schedule->ticker = $request->ticker;
                $schedule->status = "created";
                $schedule->save();
            }

            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function schedule_post_update(Request $request)
    {
        $id = $request['event']['id'];
        $start_date = $request['event']['start_date'];
        $end_date = $request['event']['end_date'];

        $schedule = ScheduleTemplates::find($id);

        $schedule->start_date = $start_date;
        $schedule->end_date = $end_date;
        $schedule->status = "updated";

        $schedule->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function schedule_post_delete(Request $request)
    {
        $id = $request['id'];

        ScheduleTemplates::find($id)->delete();
        return response()->json([
            'status' => true,
        ]);
    }

    public function format_date($date)
    {
        $date_fromat = Carbon::createFromFormat('m/d/Y h:i A', $date);

        $date_fromat = Carbon::parse($date_fromat)->format('Y-m-d H:i:s');

        return $date_fromat;
    }

    public function validateFields($startDate = null, $endDate = null, $startTime = null, $endTime = null, $deviceId = null)
    {

        $start_date = $startDate . " " . $startTime;
        $end_date = $endDate . " " . $endTime;

        foreach ($deviceId as $devices) {
            if (ScheduleTemplates::where('device_id', $devices)->exists()) {
                if(ScheduleTemplates::whereBetween('start_date',[$start_date,$end_date])
                    ->orWhereBetween('end_date',[$start_date,$end_date])
                    ->exists()){
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        }
    }
}
