<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>@yield('pageTitle') - Digital Signage System</title>
<link rel="shortcut icon" href="{{ asset('admin-assets/img/gmu-logo.png') }}">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="{{asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/css/nifty.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/pace/pace.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/jstree/themes/default/style.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/css-loaders/css/css-loaders.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="{{asset('admin-assets/plugins/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
<style>
    td ,th{
        text-align: center;
        font-size:13px !important;
        text-overflow: ellipsis;
    }
    td{
        font-size:16x !important;
        color:black !important;
    }
    .loaderClass{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        /* background: url({{asset('admin-assets/img/2D-HN.gif')}}); */
    }

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


