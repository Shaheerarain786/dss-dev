@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
<li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
<li><a href="{{url('/')}}">Dashboard</a></li>
<li class="active"><a href="{{url('branches')}}"> Device Groups</a></li>
@endsection
<style>
    span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }

    ul li,
    span.select2-selection.select2-selection--single {
        text-align: left;
    }
</style>
@section('content')
<div id="page-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Manage Device Groups</h3>
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
                    <button data-toggle="modal" data-target="#addDeviceGroup" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i>
                        &nbsp;&nbsp;Add
                    </button>
                    <button data-toggle="modal" data-target="#assignDeviceGroup" class="btn btn-primary btn-rounded">
                        <i class="fa fa-arrow-right"></i
                        >&nbsp;&nbsp;Assign
                    </button>
                    <button id="deleteBtn" type="button" class="btn btn-primary btn-rounded pull-right btn-hover-danger">
                        <i class="fa fa-trash"></i>
                        &nbsp;&nbsp;Delete
                    </button>
                    <div class="panel">
                        <div class="panel-body">
                            <table id="branches" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Device Group</th>
                                        <th>Devices</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deviceGroups as $key => $device)
                                    <tr>
                                        <td style="width: 40px">{{$key +  1}}</td>
                                        <td>{{$device->name}}</td>
                                        @if($device->devices != '' && $device->devices->count() > 0)
                                        <td>
                                            @foreach($device->devices->chunk(4) as $dev)
                                                @foreach($dev as $d)
                                                <span data-value="{{$d->id}}" id="editable-{{$d->id}}"
                                                            style="font-size:15px"
                                                            class="label label-primary editable editable-click">{{$d->device_name}}</span>
                                                @endforeach
                                            @endforeach
                                        </td>
                                        @else
                                        <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-circle"><i
                                                    class="fa fa-question"></i></button>
                                        </td>
                                        @endif
                                        <td>
                                            <a class="btn btn-primary btn-sm btn-circle"
                                                href="{{url('device-group/'. $device->id . '/edit')}}"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                                data-target="#{{$device->id}}"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('admin.device_groups.modals.delete')
                @include('admin.device_groups.modals.add')
                @include('admin.device_groups.modals.assign')
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('admin-assets/scripts/device_groups.js')}}"></script>
