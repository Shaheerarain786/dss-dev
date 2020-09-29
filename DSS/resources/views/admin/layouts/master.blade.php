<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.layouts.head')
</head>
<body>
{{--@if($_SESSION['licence'] == "true")--}}
{{--    <div class="alert alert-danger">--}}
{{--        <stong>You are using free version</stong>--}}
{{--    </div>--}}
{{--@endif--}}
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    @include('admin.layouts.header')
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    @yield('title')
                </div>
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </div>
            @yield('content')
        </div>
        @include('admin.layouts.sidebar')
    </div>
    @include('admin.layouts.footer')
</div>
@include('admin.layouts.scripts')
</body>
</html>

