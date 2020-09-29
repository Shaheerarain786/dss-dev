@extends('admin.layouts.master')
@section('pageTitle', 'Create Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li><a href="{{url('branches')}}"> Branches</a></li>
    <li class="active">Edit</li>
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
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <strong>{{session()->get('error')}}</strong>
                        </div>
                    @endif
                    {{--                    {{dd($editTemplate->id)}}--}}
                    <div class="panel-body panel-colorful">
                        <form class="form-horizontal" method="POST"
                              action="{{url('device-templates/update/' .  $editTemplate->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Device Name</label>
                                    <div class="col-sm-5">
                                        <select id="branchName" class="form-control" name="device_id">
                                            @foreach($devices as $device)
                                                <option @if($device->id == $editTemplate->device_id) selected
                                                        @endif value="{{$device->id}}">{{$device->device_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Start Date</label>
                                    <div class="col-sm-5">
                                        <input name="start_date" class="form-control" type="text"
                                               value="{{$editTemplate->start_date}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">End Date</label>
                                    <div class="col-sm-5">
                                        <input name="end_date" class="form-control" type="text"
                                               value="{{$editTemplate->end_date}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Layout Style</label>
                                    <div class="col-sm-5">
                                        <img src="{{asset('admin-assets/img/layout_1.png')}}" height="100"
                                             width="100">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Logo</label>
                                    <div class="col-sm-5">
                                        <img src="{{url($editTemplate->logo)}}" height="50" width="50"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Update Logo</label>
                                    <div class="col-sm-5">
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Video</label>
                                    <div class="col-sm-5">
                                        <video width="100%" height="500px" controls>
                                            <source src="{{url($editTemplate->video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Update Video</label>
                                    <div class="col-sm-5">
                                        <input type="file" name="video" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Ticker Text</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="ticker" class="form-control"
                                               value="{{$editTemplate->ticker}}">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <button class="btn btn-primary" type="submit">Update</button>
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

            // $("#schedule-group").hide();
            $("#error-message").hide();

            $("#branchName").select2({
                'placeholder': 'Select Devices'
            });
            $("#display_type").select2({
                'placeholder': 'Select Schedule or Urgent'
            });
            $("#datetimepickerTo").datetimepicker({
                locale: 'ru'
            });
            $("#datetimepickerFrom").datetimepicker({
                locale: 'ru'
            });

            $("#display_type").on("change", function (e) {
                e.preventDefault();

                if ($(this).val() == "urgent") {
                    $("#schedule-group").hide();
                } else if ($(this).val() == "schedule") {
                    $("#schedule-group").show();
                } else {
                    $("#error-message").show();
                }
            })
        })
    </script>

    {{--    <script>--}}
    {{--        function onCategoryChange(id) {--}}

    {{--            var category_id = id.value;--}}
    {{--            $.ajax({--}}
    {{--                type:"GET",--}}
    {{--                url: '{{ route('get_sub_category') }}',--}}
    {{--                data: {id : category_id},--}}
    {{--                success:function (response) {--}}
    {{--                    $('#sub_category').html('<option value="">Select SubCategory</option>');--}}
    {{--                    response.forEach(element => {--}}
    {{--                        var newOption = new Option(element.name , element.id ,true);--}}
    {{--                    $('#sub_category').append(newOption).trigger('change')--}}
    {{--                })--}}
    {{--                }--}}
    {{--            });--}}
    {{--        }--}}

    {{--    </script>--}}
@endsection

