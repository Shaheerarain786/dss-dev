<div class="modal fade" id="assignDeviceGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-primary">
                <h5 style="color:white !important;" class="heading">Assign Orgnization To Zones</h5>
            </div>

            <!--Body-->
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('assign-device-groups')}}">
                    @csrf
                    @method("POST")
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Device Group</label>
                            <div class="col-sm-9">
                                <select id="assign-device-group-to-device" required class="form-control" name="name">
                                    <option value=""></option>
                                    @foreach($deviceGroups as $device)
                                        <option value="{{$device->id}}">{{$device->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Devices</label>
                            <div class="col-sm-9">
                                <select id="assign-device-to-device-group" required class="form-control" name="device[]" multiple>
                                    <option value=""></option>
                                    @foreach($devices as $device)
                                        <option value="{{$device->id}}">{{$device->device_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button id="assign" class="btn btn-primary btn-rounded" type="submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Assign</button>
                    </div>
                </form>

            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <a type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
