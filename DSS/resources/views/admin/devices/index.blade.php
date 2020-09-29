@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li class="active"><a href="{{url('branches')}}"> Devices</a></li>
@endsection

@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Devices</h3>
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
                    <div class="panel-body">
                        <a href="{{url('devices/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
                        <div class="panel">
                            <div class="panel-body">
                                <table id="deviceTables" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Device Name</th>
                                        <th>Device No</th>
                                        <th>Device IP</th>
                                        <th>Device Model</th>
                                        <th>Device Screen Size (h x w)</th>
                                        <th>Device Storage Memory</th>
                                        <th>Device Screen Resolution</th>
                                        <th>Branch</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($devices as $key => $device)
                                        <tr>
                                            <td style="width: 40px">{{$key +  1}}</td>
                                            <td>{{$device->device_name ? $device->device_name : 'N/A'}}</td>
                                            <td>{{$device->device_no ? $device->device_no : 'N/A' }}</td>
                                            <td>{{$device->device_ip ? $device->device_ip : 'N/A'}}</td>
                                            <td>{{$device->device_model ? $device->device_model : 'N/A'}}</td>
                                            <td>{{$device->device_screen_height ? $device->device_screen_height : 'N/A' }}
                                                x {{$device->device_screen_width ? $device->device_screen_height : 'N/A' }}</td>
                                            <td>{{$device->device_storage_memory ? $device->device_storage_memory : 'N/A'}}</td>
                                            <td>{{$device->screen_resolution ? $device->screen_resolution : 'N/A'}}</td>
                                            @if(isset($device->branches->branch_name))
                                                <td><kbd class="bg-info"
                                                         style="font-size: 15px;padding:7px">{{$device->branches->branch_name}}</kbd>
                                                </td>
                                            @else
                                                <td><kbd style="background:red">N/A</kbd></td>
                                            @endif
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{url('devices/'. $device->id) . "/edit"}}"><i
                                                        class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#{{$device->id}}"><i
                                                        class="fas fa-times"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @foreach($devices as $d)
                        <div class="modal fade" id="{{$d->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <h4 class="heading">Are you sure you want to delete?</h4>
                                        <p class="bg-danger" style="padding:10px"><b>NOTE</b>: All related templates
                                            assgin to this device will be deleted</p>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <i style="color:red;" class="fas fa-times fa-4x animated rotateIn"></i>

                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <form method="POST" action="{{url('devices/' . $d->id)}}">
                                            @csrf
                                            {{method_field('delete')}}
                                            <a type="button" class="btn" data-dismiss="modal">No</a>
                                            <button type="submit" class="btn btn-danger waves-effect">Yes</button>
                                        </form>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                    @endforeach
                    {{--                    Devices Model--}}
                    {{--                    @foreach($devices as $d)--}}
                    {{--                        <div class="modal fade" id="branches-{{$d->id}}" tabindex="-1" role="dialog"--}}
                    {{--                             aria-labelledby="exampleModalLabel"--}}
                    {{--                             aria-hidden="true">--}}
                    {{--                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">--}}
                    {{--                                <!--Content-->--}}
                    {{--                                <div class="modal-content text-center">--}}
                    {{--                                    <!--Header-->--}}
                    {{--                                    <div class="modal-header d-flex justify-content-center bg-info">--}}
                    {{--                                        <h5 style="color:white !important;" class="heading">{{$d->device_name}} Has--}}
                    {{--                                            Branches</h5>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!--Body-->--}}
                    {{--                                    <div class="modal-body">--}}
                    {{--                                        <ul class="list-group">--}}
                    {{--                                            @foreach($d->branches as $branch)--}}
                    {{--                                                @if(isset($branch->branch_name))--}}
                    {{--                                                    <li class="list-group-item">{{$branch->branch_name}}</li>--}}
                    {{--                                                @endif--}}
                    {{--                                            @endforeach--}}
                    {{--                                        </ul>--}}

                    {{--                                    </div>--}}

                    {{--                                    <!--Footer-->--}}
                    {{--                                    <div class="modal-footer flex-center">--}}
                    {{--                                        <a type="button" class="btn btn-info" data-dismiss="modal"><i--}}
                    {{--                                                class="fa fa-times"></i></a>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <!--/.Content-->--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#deviceTables").DataTable();
    })
</script>
