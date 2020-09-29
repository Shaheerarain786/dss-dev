@extends('admin.layouts.master')
@section('pageTitle', 'Create Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li><a href="{{url('branches')}}"> Branches</a></li>
    <li class="active">Create</li>
@endsection
@section('content')
    <style>
        input[type=radio] {
            border: 0px;
            width: 30px;
        }
    </style>
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading panel-primary panel-colorful">
                        <h3 class="panel-title">Manage Templates</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <stong>{{session()->get("success")}}</stong>
                        </div>
                    @endif
                    @if(session()->has("error"))
                        <div class="alert alert-danger">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <stong>{{session()->get("error")}}</stong>
                        </div>
                    @endif
                    <div class="panel-body panel-colorful">

                        <form class="form-horizontal" method="POST" action="{{url('device-templates/store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Device Name</label>
                                    <div class="col-sm-5">
                                        <select id="branchName" class="form-control" multiple name="device_name">
                                            @foreach($devices as $device)
                                                <option value=""></option>
                                                <option value="{{$device->id}}">{{$device->device_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Select Display Type</label>
                                    <div class="col-sm-5">
                                        <select id="display_type" class="form-control" name="schedule_type">
                                            <option value=""></option>
                                            <option value="urgent">Urgent</option>
                                            <option value="schedule">Schedule</option>
                                        </select>
                                        <p id="error-message" class="bg-danger" style="padding:5px;text-align: center">Please Select this field</p>
                                    </div>
                                </div>
                                <div class="form-group" id="schedule-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Schedule</label>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class='col-sm-6' id='datetimepicker3'>
                                                <input id="datetimepickerTo" type="text" class="form-control" placeholder="To" name="schedule_to">
                                            </div>
                                            <div class='col-sm-6' id='datetimepicker3'>
                                                <input id="datetimepickerFrom" type="text" class="form-control" placeholder="From" name="schedule_from">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Layout Style</label>
                                    <div class="col-sm-5">
                                        <input style="height: 20px" type="radio" name="template_type" value="default">
                                        <img src="{{asset('admin-assets/img/layout_1.png')}}" height="100" width="100">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Logo</label>
                                    <div class="col-sm-5">
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Video</label>
                                    <div class="col-sm-5">
                                        <input type="file" name="video" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Ticker Text</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="ticker" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <button class="btn btn-primary" type="submit">Set</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (e) {

            $("#schedule-group").hide();
            $("#error-message").hide();

            $("#branchName").select2({
                'placeholder': 'Select Devices'
            });
            $("#display_type").select2({
               'placeholder' : 'Select Schedule or Urgent'
            });
            $("#datetimepickerTo").datetimepicker({
                locale: 'ru'
            });
            $("#datetimepickerFrom").datetimepicker({
                locale: 'ru'
            });

            $("#display_type").on("change",function (e) {
                e.preventDefault();

                if($(this).val() == "urgent"){
                    $("#schedule-group").hide();
                }
                else if($(this).val() == "schedule"){
                    $("#schedule-group").show();
                }
                else{
                    $("#error-message").show();
                }
            })
        })
    </script>

    
@endsection

