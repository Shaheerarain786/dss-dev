@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
<li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
<li><a href="{{url('/')}}">Dashboard</a></li>
<li class="active"><a href="{{url('branches')}}"> Branches</a></li>
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
                    <h3 class="panel-title">Manage Organizations</h3>
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
                    <button class="btn btn-success">Primary</button>
                    <button data-toggle="modal" data-target="#addOrg" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>&nbsp;&nbsp; Add</button>
                    <button data-toggle="modal" data-target="#assignOrganization" class="btn btn-primary btn-rounded"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp; Assign</button>
                    <button id="deleteBtn" type="button" class="btn btn-primary btn-rounded pull-right btn-hover-danger"><i class="fa fa-times"></i> &nbsp;&nbsp;Delete
                    </button>
                    <div class="panel">
                        <div class="panel-body">
                            <table id="branches" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Organization Name</th>
                                        <th>Zones</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($organizations as $key => $orgs)
                                    <tr>
                                        <td style="width: 40px">{{$key +  1}}</td>
                                        <td>{{$orgs->name}}</td>
                                        @if($orgs->zones->count() > 0)
                                        <td>
                                            @foreach($orgs->zones->chunk(4) as $zone)
                                                @foreach($zone as $z)
                                                <span data-value="{{$z->id}}" id="editable-{{$z->id}}"
                                                            style="font-size:15px"
                                                            class="label label-primary editable editable-click">{{$z->name}}</span>
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
                                            <a class="btn btn-primary btn-sm"
                                                href="{{url('organization/'. $orgs->id . '/edit')}}"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#{{$orgs->id}}"><i class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('admin.organizations.modals.delete')
                @include('admin.organizations.modals.add')
                @include('admin.organizations.modals.assign')
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        // Select2

        $("#assign-org-dropdown").select2({
            placeholder: 'Select Organization',
            dropdownParent: $('#assignOrganization')
        });

        $("#assign-zone-dropdown").select2({
            placeholder: 'Select Zones',
            dropdownParent: $('#assignOrganization')
        })

        //Datatables

        $("#branches").DataTable();

        //CheckBoxes

        if ($(".selectedBox:checked")) {
            console.log("checked");
        } else {
            console.log($(".selectedBox").val());
        }

        $("#orgName").on("change", function() {

            let organizationName = $(this).val().toUpperCase();
            let firstThreeCharactes = organizationName.substr(0,3);
            let number = Math.floor(Math.random()*(999-100+1)+100);
            let date = new Date();
            let year = date.getFullYear();

            let organizationID = firstThreeCharactes + '-' + year + '-' + number;

            $("#orgId").val(organizationID);
        })

    })
</script>
