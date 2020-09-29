@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li class="active"><a href="{{url('branches')}}"> Device Templates</a></li>
@endsection
@section('content')
    <style>
        body {
            padding-top:0px;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
            font-size: 20px;
        }
        .tv-bg{
            border:solid 15px #000;}

        .fixed-top {
            position: relative;
            top: 10px;
            right: 0;
            left: 0;
            z-index: 1030;
            margin: 0px 10px;

        }
        .tv-bottom{
            width:40%;
            height:40px;
            background:#000;
            margin:0 auto;
            padding-top: 5px;	}

        .tv-line{
            width:60%;
            height:15px;
            background:#fff;
            margin:0 auto;}

        .bg-dark {
            background-color: #25476a!important;
        }
        .bg-dark2 {
            padding:10px 0px;
            background-color: #25476a!important;
        }

        .logo{
            display: block;
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            color:#fff;
            font-size: 3.25rem;
            font-weight: 500;
            line-height: inherit;
            white-space: nowrap;
            text-transform: uppercase;
            text-align: center;}


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
            border-top-left-radius:5px;
            border-top-right-radius:5px;
        }
        .list-group ul{
            list-style:none;
            padding:0px;
            margin:0px;}

        .list-group ul li{
            position: relative;
            display: block;
            padding: 0px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid rgba(0,0,0,.125);
            font-size: 20px;
            line-height: 70px;}

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
        .list-group ul li a{

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
    </style>
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
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
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <stong>{{session()->get("success")}}</stong>
                        </div>
                    @endif
                    @if(session()->has("error"))
                        <div class="alert alert-danger">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <stong>{{session()->get("error")}}</stong>
                        </div>
                    @endif
                    <div class="panel-body">

                    </div>
                    @foreach($devices_templates as $key => $d_template)
                        <div class="panel-body text-right">
                            <a class="btn btn-info" href="{{url('device-templates/edit/' . $d_template->id)}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger" href="{{url('device-templates/delete/' . $d_template->id)}}"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="panel-body">
                            <div class="tv-bg">

                                <!-- Navigation -->
                                <div class="bg-dark fixed-top">
                                    <div class="container">
                                        <div class="logo">
                                            <img src="{{url($d_template->logo)}}" height="50" width="50">
                                        </div>
                                    </div>
                                </div>

                                <!-- Page Content -->
                                <div class="container">

                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="list-group text-center">
                                                <ul>
                                                    <li><a href="#" class="list-group-item active">QMS Numbers</a></li>
                                                    <li><a href="#" class="">1001</a></li>
                                                    <li><a href="#" class="">22211</a></li>
                                                    <li><a href="#" class="">88711</a></li>
                                                    <li><a href="#" class="">22001</a></li>
                                                    <li><a href="#" class="">12233</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.col-lg-3 -->

                                        <div class="col-lg-9">

                                            <div class="card mt-4">
{{--                                                <iframe width="100%" height="500px"--}}
{{--                                                        src="https://www.youtube.com/embed/a3ICNMQW7Ok?autoplay=1">--}}
{{--                                                </iframe>--}}
                                                <video width="100%" height="500px" controls>
                                                    <source src="{{url($d_template->video)}}" type="video/mp4">
                                                </video>

                                            </div>
                                            <!-- /.card -->


                                            <!-- /.card -->

                                        </div>
                                        <!-- /.col-lg-9 -->

                                    </div>

                                </div>
                                <!-- /.container -->

                                <!-- Footer -->
                                <footer class="bg-dark2">
                                    <div class="container">
                                        <marquee class="m-0 text-center text-white">{{$d_template->ticker}}</marquee>
                                    </div>
                                    <!-- /.container -->
                                </footer>

                            </div>
                            <div class="tv-bottom">
                                <div class="tv-line"></div>
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
        //Datatables
        $("#branches").DataTable();

        //CheckBoxes

        if ($(".selectedBox:checked")) {
            console.log("checked");
        } else {
            console.log($(".selectedBox").val());
        }

    })
</script>
