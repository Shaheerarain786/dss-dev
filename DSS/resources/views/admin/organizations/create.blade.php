@extends('admin.layouts.master')
@section('pageTitle', 'Create Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li><a href="{{url('branches')}}"> Branches</a></li>
    <li class="active">Create</li>
@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading panel-primary panel-colorful">
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
                    <div class="panel-body panel-colorful">

                        <form class="form-horizontal" method="POST" action="{{url('branches')}}">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Branch Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" placeholder="Branch Name" id="demo-hor-inputemail"
                                               class="form-control" name="branch_name" {{old('branch_name')}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Branch Code</label>
                                    <div class="col-sm-5">
                                        <input type="text" placeholder="Branch Code" id="demo-hor-inputemail"
                                               class="form-control" name="branch_code" {{old('branch_code')}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Branch Manager's Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" placeholder="Branch Manager's Name" id="demo-hor-inputemail"
                                               class="form-control"
                                               name="branch_manager_name" {{old('branch_manager_name')}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Branch Contact No</label>
                                    <div class="col-sm-5">
                                        <input type="text" placeholder="Branch Contact No" id="demo-hor-inputemail"
                                               class="form-control"
                                               name="branch_contact_no" {{old('branch_contact_no')}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Branch IT Support Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" placeholder="Branch IT Support Name" id="demo-hor-inputemail"
                                               class="form-control"
                                               name="branch_it_support_name" {{old('branch_it_support_name')}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label text-primary text-bold"
                                           for="demo-hor-inputemail">Branch IT Support No</label>
                                    <div class="col-sm-5">
                                        <input type="text" placeholder="Branch IT Support No" id="demo-hor-inputemail"
                                               class="form-control"
                                               name="branch_it_support_no" {{old('branch_it_support_no')}}>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <button class="btn btn-primary" type="submit">Create</button>
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
            // $("#datetimepicker").datetimepicker();
        })
    </script>
@endsection

