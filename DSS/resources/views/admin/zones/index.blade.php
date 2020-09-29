@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li class="active"><a href="{{url('branches')}}"> Zones</a></li>
@endsection
<style>
    ul {
        text-align: left !important;
    }
    .checkBoxDiv{
        width:10px;
    }
    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        width: 100% !important;
        text-align:left;
    }
</style>
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Zones</h3>
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
                    <div id="message" class="alert alert-success">
                        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                        <strong></strong>
                    </div>
                    <div class="panel-body">
                        <button data-toggle="modal" data-target="#addZone" class="btn btn-primary btn-rounded"><i
                                class="fa fa-plus"></i> &nbsp;&nbsp;Add
                        </button>
                        <button data-toggle="modal" data-target="#assign_zones" class="btn btn-primary btn-rounded"><i
                                class="fa fa-arrow-right"></i> &nbsp;&nbsp;Assign
                        </button>
                        <button id="deleteBtn" type="button" class="btn btn-primary btn-rounded pull-right btn-hover-danger"><i
                                class="fa fa-times"></i> &nbsp;&nbsp;Delete
                        </button>
                        <div class="panel">
                            <div class="panel-body">
                                <table id="branches" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="checkBoxDiv">
                                            <div class="checkbox">
                                                <input id="demo-remember-me" value="" class="magic-checkbox checkBoxMain" type="checkbox">
                                                <label for="demo-remember-me"></label>
                                            </div>
                                        </th>
                                        <th>#</th>
                                        <th>Zone Name</th>
                                        <th>Cities Assigned</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($zones as $key => $zone)
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input data-zone_id="{{$zone->id}}" id="zone-check-{{$zone->id}}" value="{{$zone->id}}" class="magic-checkbox" type="checkbox">
                                                    <label for="zone-check-{{$zone->id}}"></label>
                                                </div>
                                            </td>
                                            <td style="width: 40px">{{$key +  1}}</td>
                                            <td>{{$zone->name}}</td>
                                            @if($zone->cities->count() > 0)
                                                <td>
                                                    @foreach($zone->cities->chunk(4) as $city)
                                                        @foreach($city as $c)
                                                            <span data-value="{{$c->id}}" id="editable-{{$c->id}}"
                                                                  style="font-size:15px"
                                                                  class="label label-primary editable editable-click">{{$c->name}}</span>
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <button class="btn btn-warning btn-icon btn-circle"><i
                                                            class="fa fa-question"></i></button>
                                                </td>
                                            @endif
                                            <td>
                                                <a class="btn btn-primary btn-sm btn-circle"
                                                   href="{{url('zones/'. $zone->id . '/edit')}}"><i
                                                        class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                                        data-target="#{{$zone->id}}"><i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @include('admin.zones.modals.add')
                    @include('admin.zones.modals.assign')
                    @include('admin.zones.modals.delete')
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('admin-assets/scripts/zones.js')}}"></script>
<script>
</script>
