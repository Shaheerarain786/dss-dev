@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li class="active"><a href="{{url('device-templates')}}"> Device Templates</a></li>
@endsection

@section('content')
    <style>
        body {
            padding-top: 0px;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
            font-size: 20px;
        }

        .tv-bg {
            border: solid 15px #000;
        }

        .fixed-top {
            position: relative;
            top: 10px;
            right: 0;
            left: 0;
            z-index: 1030;
            margin: 0px 10px;

        }

        .tv-bottom {
            width: 40%;
            height: 40px;
            background: #000;
            margin: 0 auto;
            padding-top: 5px;
        }

        .tv-line {
            width: 60%;
            height: 15px;
            background: #fff;
            margin: 0 auto;
        }

        .bg-dark {
            background-color: #25476a !important;
        }

        .bg-dark2 {
            padding: 10px 0px;
            background-color: #25476a !important;
        }

        .logo {
            display: block;
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            color: #fff;
            font-size: 3.25rem;
            font-weight: 500;
            line-height: inherit;
            white-space: nowrap;
            text-transform: uppercase;
            text-align: center;
        }


        .container {
            max-width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .list-group {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            margin-top: 25px;
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #25476a;
            border-color: #25476a;
        }

        .list-group-item:first-child {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .list-group ul {
            list-style: none;
            padding: 0px;
            margin: 0px;
        }

        .list-group ul li {
            position: relative;
            display: block;
            padding: 0px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .125);
            font-size: 20px;
            line-height: 70px;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 0px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 0px;
            font-size: 20px;
            line-height: 60px;

        }

        .list-group ul li a {

            /*background: #25476a;*/
            color: black;
        }

        a:hover {
            color: #0056b3;
            text-decoration: none;
        }

        marquee.m-0.text-center.text-white {
            color: rgb(255, 255, 255);
        }

        .modal-dialog {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .modal-content {
            height: auto;
            min-height: auto;
            border-radius: 0;
        }

        .modal-dialog.modal-lg.modal-notify.modal-danger {
            width: 80%;
        }
    </style>
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Device Templates</h3>
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
{{--                        <a class="btn btn-primary" href="{{url('device-templates/create/')}}">Create Device Template</a>--}}
                        <div class="panel">
                            <div class="panel-body">
                                <table id="deviceTables" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Device Name</th>
                                        <th>Start Date and Time</th>
                                        <th>End Date and Time</th>
                                        <th>Ticker</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($get_scheduled_templates as $key => $device)
                                        <tr>
                                            <td>{{$key +  1}}</td>
                                            <td>{{$device->devices->device_name}}</td>
                                            <td><i
                                                    class="fa fa-clock"></i>&nbsp;&nbsp;{{$device->start_date}}</td>
                                            <td><i
                                                    class="fa fa-clock"></i>&nbsp;&nbsp;{{$device->end_date}}</td>
                                            <td>{{$device->ticker}}</td>
                                            <td><a class="btn btn-info btn-sm" data-toggle="modal"
                                                   data-target="#temp-{{$device->id}}"><i
                                                        class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{url('device-templates/edit/'. $device->id)}}"><i
                                                        class="fas fa-edit"></i></a>
                                            </td>

                                            <td><a class="btn btn-danger btn-sm" data-toggle="modal"
                                                   data-target="#delete-{{$device->id}}"><i
                                                        class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @foreach($get_scheduled_templates as $d)
                        <div class="modal fade" id="temp-{{$d->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Body-->
                                    <div class="modal-body">
                                        <div class="text-right">
                                            <button data-dismiss="modal" class="btn btn-default text-danger"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                        <div class="panel-body">
                                            <div class="tv-bg">
                                                <div class="bg-dark fixed-top">
                                                    <div class="container">
                                                        <div class="logo">
                                                            <img src="{{url($d->logo)}}" height="50" width="50">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">

                                                    <div class="row">

                                                        <div class="col-lg-3">
                                                            <div class="list-group text-center">
                                                                <ul>
                                                                    <li><a href="#" class="list-group-item active">QMS
                                                                            Numbers</a></li>
                                                                    <li><a href="#" class="">1001</a></li>
                                                                    <li><a href="#" class="">22211</a></li>
                                                                    <li><a href="#" class="">88711</a></li>
                                                                    <li><a href="#" class="">22001</a></li>
                                                                    <li><a href="#" class="">12233</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">

                                                            <div class="card mt-4">
                                                                <video width="100%" height="500px" controls>
                                                                    <source src="{{url($d->video)}}" type="video/mp4">
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <footer class="bg-dark2">
                                                    <div class="container">
                                                        <marquee
                                                            class="m-0 text-center text-white">{{$d->ticker}}</marquee>
                                                    </div>
                                                </footer>

                                            </div>
                                            <div class="tv-bottom">
                                                <div class="tv-line"></div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                    <div class="modal-footer flex-center">--}}
                                    {{--                                        <a type="button" class="btn btn-danger" data-dismiss="modal"><i--}}
                                    {{--                                                class="fa fa-times"></i></a>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($get_scheduled_templates as $dev)
                        <div class="modal fade" id="delete-{{$dev->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <h4 class="heading">Are you sure you want to delete</h4>
                                    </div>
                                    <div class="modal-body">

                                        <i style="color:red;" class="fas fa-times fa-4x animated rotateIn"></i>

                                    </div>
                                    <div class="modal-footer flex-center">
                                        <form method="POST"
                                              action="{{url('device-templates/delete/' . $d->id)}}">
                                            @csrf
                                            @method('DELETE')
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
<script>
    $(document).ready(function () {
        $("#deviceTables").DataTable();
    })
</script>
