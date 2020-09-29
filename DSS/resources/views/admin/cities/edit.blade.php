@extends('admin.layouts.master')
@section('pageTitle', 'Edit Categories')
@section('breadcrumb')
<li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
<li><a href="{{url('/')}}">Dashboard</a></li>
<li><a href="{{url('branches')}}"> Cities</a></li>
<li class="active">Update</li>
@endsection
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
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{url('cities/' . $city->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-primary text-bold"
                                    for="demo-hor-inputemail">Select Zone</label>
                                <div class="col-sm-5">
                                    <select id="cityName" class="form-control" required name="zone_id">
                                        @foreach($zones as $zone)
                                        <option @if($city->zone_id == $zone->id) selected @endif
                                            value="{{$zone->id}}">{{$zone->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-primary text-bold"
                                    for="demo-hor-inputemail">City Name</label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="City Name" required id="demo-hor-inputemail"
                                        class="form-control" name="name" value="{{$city->name}}">
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
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
        $("#cityName").select2({
            'placeholder': 'Select Zone'
        });
    })

</script>
@endsection
