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
                        <h3 class="panel-title">Manage Branches</h3>
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
                        <a href="{{url('branches/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
                        <button data-target="#assignBranches" data-toggle="modal" class="btn btn-primary btn-rounded"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;Assign</button>
                        <button id="deleteBtn" type="button" class="btn btn-primary btn-rounded pull-right btn-hover-danger"><i class="fa fa-times"></i> &nbsp;&nbsp;Delete</button>
                        <div class="panel">
                            <div class="panel-body">
                                <table id="branches" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Name</th>
                                        <th>Branch Code</th>
                                        <th>Branch Manager Name</th>
                                        <th>Branch Contact No</th>
                                        <th>Branch IT Support Name</th>
                                        <th>Branch IT Support No</th>
                                        <th>Device Groups</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($branches as $key => $branch)
                                        <tr>
                                            <td style="width: 40px">{{$key +  1}}</td>
                                            <td>{{$branch->branch_name}}</td>
                                            <td>{{$branch->branch_code}}</td>
                                            <td>{{$branch->branch_manager_name}}</td>
                                            <td>{{$branch->branch_contact_no}}</td>
                                            <td>{{$branch->branch_it_support_name}}</td>
                                            <td>{{$branch->branch_it_support_no}}</td>
                                            @if($branch->device_group->count() > 0)
                                                <td>
                                                    @foreach($branch->device_group->chunk(1) as $device)
                                                        @foreach($device as $d)
                                                            <span data-value="{{$d->id}}" id="editable-{{$d->id}}" style="font-size:15px"
                                                                  class="label label-primary editable editable-click">{{$d->name}}</span>
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
                                                   href="{{url('branches/'. $branch->id . '/edit')}}"><i
                                                        class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                                        data-target="#{{$branch->id}}"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @include('admin.branches.modals.assign')
{{--                    @include('admin.branches.modals.assign-view')--}}
                    @foreach($branches as $b)
                        <div class="modal fade" id="{{$b->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center bg-primary">
                                        <h5 class="heading text-sm-center text-light">Are you sure you want to delete ?</h5>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <i style="color:red;" class="fas fa-trash fa-4x animated rotateIn"></i>

                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <form method="POST" action="{{url('branches/' . $b->id)}}">
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
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('admin-assets/scripts/branches.js')}}"></script>
