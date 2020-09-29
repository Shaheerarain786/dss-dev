<div class="modal fade" id="assignBranches" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-primary">
                <h5 style="color:white !important;" class="heading">Assign Branches to City</h5>
            </div>

            <!--Body-->
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('assign-branches')}}">
                    @csrf
                    @method("POST")
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail"> Branch Name</label>
                            <div class="col-sm-9">
                                <select id="branch_to_device_group" required class="form-control" name="branch_name">
                                    <option value=""></option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Device Group</label>
                            <div class="col-sm-9">
                                <select style="font-family: FontAwesome" id="device_group_to_branch" required class="form-control" name="device_group[]" multiple>
                                    <option value=""></option>
                                    @foreach($device_groups as $device)
                                        <option @if($device->branch_id != null) disabled @endif value="{{$device->id}}">
                                            @if($device->branch_id != null)
                                                {{$device->name}} <span> (Assigned) </span>
                                            @else
                                                {{$device->name}}
                                            @endif
                                        </option>
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
