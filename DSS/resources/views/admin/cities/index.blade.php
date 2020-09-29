@extends('admin.layouts.master')
@section('pageTitle', 'All Cities')
@section('breadcrumb')
<li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
<li><a href="{{url('/')}}">Dashboard</a></li>
<li class="active"><a href="{{url('branches')}}"> Cities</a></li>
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
                    <h3 class="panel-title">Manage Cities</h3>
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
                    <button data-toggle="modal" data-target="#addCity" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i>
                        &nbsp;&nbsp;Add Cities
                    </button>
                    <button id="assign" data-toggle="modal" data-target="#assignCity"  type="button" class="btn btn-primary btn-rounded">
                        <i class="fa fa-arrow-right"></i>
                        &nbsp;&nbsp;Assign
                    </button>
                    <button id="deleteBtn" type="button" class="btn btn-primary btn-rounded pull-right btn-hover-danger">
                        <i class="fa fa-times"></i>
                        &nbsp;&nbsp;Delete
                    </button>
                    <button style="background-color: rgb(31 93 79)" data-toggle="modal" data-target="#importCities" class="btn btn-primary btn-rounded">
                        <i class="fa fa-file-excel"></i>
                        &nbsp;&nbsp;Import Excel
                    </button>

                    <div class="panel">
                        <div class="panel-body">
                            <table id="branches" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>City Name</th>
                                        <th>Branches</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $key => $city)
                                    <tr>
                                        <td style="width: 40px">{{$key +  1}}</td>
                                        <td>{{$city->name}}</td>
                                        @if($city->branches->count() > 0)
                                        <td>
                                            @foreach($city->branches->chunk(4) as $branch)
                                                @foreach($branch as $b)
                                                <span data-value="{{$b->id}}" id="editable-{{$b->id}}" style="font-size:15px"
                                                    class="label label-primary editable editable-click">{{$b->branch_name}}</span>
                                                @endforeach
                                            <br><br>
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
                                                href="{{url('cities/'. $city->id . '/edit')}}"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                                data-target="#{{$city->id}}"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('admin.cities.modals.assign')
                @include('admin.cities.modals.delete')
                @include('admin.cities.modals.add')
                @include('admin.cities.modals.import')
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('admin-assets/scripts/cities.js')}}"></script>
