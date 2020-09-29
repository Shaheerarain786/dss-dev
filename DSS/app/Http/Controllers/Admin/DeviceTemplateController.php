<?php

namespace App\Http\Controllers\Admin;

use App\Device;
use App\DeviceTemplates;
use App\Http\Controllers\Controller;
use App\ScheduleTemplates;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class DeviceTemplateController extends Controller
{
    public function index()
    {
        $get_scheduled_templates = ScheduleTemplates::with('devices')->get();

        return view('admin.device_templates.index', compact('get_scheduled_templates'));
    }

    public function create()
    {
        $devices = Device::all();
        return view('admin.device_templates.set_teamplate', compact('devices'));
    }

    public function store_template(Request $request)
    {
        $request->validate([
            'device_name' => 'required',
            'schedule_type' => 'required',
            'ticker' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'video' => 'mimes:mp4,mov,ogg | max:20000'
        ]);

        $validate = $this->validation($request->device_name, $request->schedule_type, $request->schedule_from, $request->schedule_to);

        if ($validate == false) {

            return back()->with('error', 'Device Id or Schedule Already');

        } else {
            $template = new DeviceTemplates();
            $template->device_id = $request->device_name;
            $template->template_type = $request->template_type;

            if ($request->schedule_type == "schedule") {
                $template->schedule_from = $this->format_date($request->schedule_from);
                $template->schedule_to = $this->format_date($request->schedule_to);
            }
            if ($request->schedule_type == "urgent") {
                $template->is_urgent = true;
            }

            if ($request->hasFile('logo')) {

                $file = $request->file('logo');

                $fileName = $file->getClientOriginalName();

                $path = public_path() . '/uploads/photos';

                $file->move($path, $fileName);

                $template->logo = '/uploads/photos/' . $fileName;
            }
            if ($request->hasFile('video')) {

                $file = $request->file('video');

                $fileName = $file->getClientOriginalName();

                $path = public_path() . '/uploads/videos';

                $file->move($path, $fileName);

                $template->video = '/uploads/videos/' . $fileName;
            }

            $template->ticker = $request->ticker;

            $template->is_updated = true;

            $template->save();

            return redirect('device-templates')->with('success', 'template set successfullly');
        }


    }

    public function edit_template($id)
    {
        $editTemplate = ScheduleTemplates::find($id);
        $devices = Device::all();
        return view('admin.device_templates.edit', compact('editTemplate', 'devices'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'device_id' => 'required',
            'ticker' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'video' => 'mimes:mp4,mov,ogg|max:20000',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $validate = $this->validateFields($request->start_date, $request->end_date, $request->device_id);

        if ($validate == false) {

            return back()->with('error', 'Device already scheduled on this date and time');

        } else {
            $updateDeviceTemplate = ScheduleTemplates::find($id);

            if ($request->hasFile('logo')) {

                $file = $request->file('logo');

                $fileName = $file->getClientOriginalName();

                $path = public_path() . '/uploads/photos';

                $file->move($path, $fileName);

                $updateDeviceTemplate->logo = '/uploads/photos/' . $fileName;
            }
            if ($request->hasFile('video')) {

                $file = $request->file('video');

                $fileName = $file->getClientOriginalName();

                $path = public_path() . '/uploads/videos';

                $file->move($path, $fileName);

                $updateDeviceTemplate->video = '/uploads/videos/' . $fileName;
            }

            $updateDeviceTemplate->device_id = $request->device_id;
            $updateDeviceTemplate->ticker = $request->ticker;
            $updateDeviceTemplate->status = "updated";
            $updateDeviceTemplate->start_date = $request->start_date;
            $updateDeviceTemplate->end_date = $request->end_date;
            $updateDeviceTemplate->save();

            return redirect('device-templates')->with('success', 'Template Updated Scucessfully');
        }

    }

    public function delete_template($id)
    {
            ScheduleTemplates::findOrFail($id)->delete();

            return redirect('device-templates')->with('success', 'Device Deleted Successfully');
    }

    public function validateFields($startDate, $endDate, $deviceId)
    {
        $validation = ScheduleTemplates::whereBetween('start_date', [$startDate, $endDate])
            ->orWhereBetween('end_date', [$startDate, $endDate])->count();
        if ($validation > 1){
            return false;
        } else {
            return true;
        }
    }

    public function format_date($date)
    {
        $date_fromat = Carbon::createFromFormat('m/d/Y h:i A', $date);

        $date_fromat = Carbon::parse($date_fromat)->format('Y-m-d H:i:s');

        return $date_fromat;
    }
}
