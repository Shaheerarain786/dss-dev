@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li class="active"><a href="{{url('branches')}}"> Device Templates</a></li>
@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Templates</h3>
                    </div>
                    <div class="panel-body panel-colorful">
                        <div class="row">
                            <div class="col-sm-3">
                                <select id="options" class="form-control">
                                    <option value="">Create Element</option>
                                    <option value="image">Logo Image</option>
                                    <option value="video">Video Section</option>
                                    <option value="marquee">Ticker Message</option>
                                    <option value="list">Que Number List</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input id="height" type="number" placeholder="Height In pixels" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <input id="width" type="number" placeholder="Width In pixels" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <button id="element-create" class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered" style="height: 500px">
                    <div class="panel-heading panel-warning panel-colorful">
                        <h3 class="panel-title">Draggable Panel</h3>
                    </div>
                    <div id="drage-panel" class="panel-body panel-colorful">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {

        $("#options").select2();

        $("#element-create").on("click",function (e) {
            e.preventDefault();

            let inputType = $("#options").val();
            let h = $("#height").val();
            let w = $("#width").val();
            console.log(inputType);
            createDynamicElements(inputType,h,w);
        });

    })

    let createDynamicElements = (inputType,height,width) => {
        if(inputType === "image")
        {
            $('<input />', {
                id: "logo",
                type: 'file',
                name: 'logo'
            }).appendTo("#drage-panel").css({
                'width' : width +'px',
                'height' :  height + 'px',
                'border' : 'solid 1px black'
            });
            draggable("logo");
        }
        if(inputType === "video"){
            $('<input />', {
                id: "video",
                type: 'file',
                name: 'video'
            }).appendTo("#drage-panel").css({
                'width' : width +'px',
                'height' :  height + 'px',
                'border' : 'solid 1px black'
            });

            draggable("video");
        }
    }

    let draggable = (element_id) => {
        var draggable = $('#'+element_id); //element

        draggable.on('mousedown', function(e){
            var dr = $(this).addClass("drag").css("cursor","move");
            height = dr.outerHeight();
            width = dr.outerWidth();
            ypos = dr.offset().top + height - e.pageY,
                xpos = dr.offset().left + width - e.pageX;
            $(document.body).on('mousemove', function(e){
                var itop = e.pageY + ypos - height;
                var ileft = e.pageX + xpos - width;
                if(dr.hasClass("drag")){
                    dr.offset({top: itop,left: ileft});
                }
            }).on('mouseup', function(e){
                dr.removeClass("drag");
            });
        });
    }
</script>
