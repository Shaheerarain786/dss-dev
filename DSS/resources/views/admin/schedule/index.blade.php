@include('admin.layouts.head')
<link href="{{asset('admin-assets/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
<link href="{{asset('admin-assets/plugins/fullcalendar/nifty-skin/fullcalendar-nifty.min.css')}}" rel="stylesheet">
<style>
    i.fa.fa-times {
        margin-top: 1px;
        color: rgb(255 0 0);
    }

    span.btn.btn-default.pull-right.btn-xs {
        border-radius: 0px !important;
    }

    a.fc-day-grid-event.fc-event.fc-start.fc-end.fc-draggable {
        border-radius: 10px !important;
        padding: 5px !important;
        box-shadow: 1px 2px 12px 3px lightgrey;
    }

    a.fc-day-grid-event.fc-event.fc-start.fc-end.fc-draggable:hover {
        background: red !important;
        border: none !important;
        transition: .35s ease-in-out;
    !important;
    }
</style>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <input id="csrf" type="hidden" value="{{csrf_token()}}">
    <div class="boxed">

        <div id="page-content">
            <div class="panel">
                <div class="panel-body">
                    <div class="alert alert-success" id="statusContainer">
                        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                        <stong id="statusMessage"></stong>
                    </div>
                    <div class="fixed-fluid">
                        <div class="fixed-sm-200 pull-sm-left fixed-right-border">
                            <div class="panel panel-primary panel-colorful media middle pad-all">
                                <div class="media-left">
                                    <div class="pad-hor">
                                        <i class="fa fa-desktop fa-2x"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="mar-no text-semibold">Select Devices</p>
                                </div>
                            </div>
                            <hr>
                            <div id="demo-jstree-1">
                                <ul>
                                    <li> Branches
                                        <ul id="branches-tree">
                                            @foreach($branches as $branch)
                                                <li data-branch-value="{{$branch->id}}">{{$branch->branch_name}}
                                                    <ul>
                                                        <li>Devices
                                                            <ul id="device-tree">
                                                                @foreach($branch->devices as $device)
                                                                    <li data-parent_branch="{{$branch->id}}"
                                                                        data-jstree='{"type":"devices"}' data-device-value="{{$device->id}}">{{$device->device_name}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                </ul>
                            </div>
                        </div>
                        <div class="fluid">
                            <!-- Calendar placeholder-->
                            <!-- ============================================ -->
                            <div id='demo-calendar'></div>
                            <!-- ============================================ -->
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="demo-modal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
                        <!--Content-->
                        <div class="modal-content text-center">
                            <!--Header-->
                            <div class="modal-header d-flex justify-content-center">
                                <p class="bg-primary" style="padding:7px"><b>Add Features</b></p>
                            </div>

                            <!--Body-->

                            <p id="errorMessage" style="padding: 10px" class="bg-danger"></p>
                            <div class="modal-body">
                                <form id="templateModalForm" class="form-horizontal" enctype="multipart/form-data">

                                    <input type="hidden" name="devices" value="">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="title">Title</label>
                                            <div class="col-sm-10">
                                                <input name="title" type="text" placeholder="Title" id="title"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="color">Logo</label>
                                            <div class="col-sm-10">
                                                <input name="logo" id="logo" type="file" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="color">Video</label>
                                            <div class="col-sm-10">
                                                <input name="video" id="video" type="file" value=""
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="color">Ticker</label>
                                            <div class="col-sm-10">
                                                <input name="ticker" id="ticker" type="text" value=""
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="color">Start Date</label>
                                            <div class="col-sm-10">
                                                <input name="start_date" id="start_date" type="text" value=""
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="color">Start Time</label>
                                            <div class="col-sm-10">
                                                <div class='input-group date' id='start_time'>
                                                    <input name="start_time" type='text' class="form-control"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="color">End Date</label>
                                            <div class="col-sm-10">
                                                <input name="end_date" id="end_date" type="text" value=""
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="color">End Time</label>
                                            <div class="col-sm-10">
                                                <div class='input-group date' id='end_time'>
                                                    <input name="end_time" type='text' class="form-control"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>
                                        </button>

                                        {{--                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i--}}
                                        {{--                                                class="fa fa-times"></i></button>--}}
                                    </div>
                                </form>

                                <div id="loaderShowHide" class="load5">
                                    <div class="loader"></div>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer flex-center">
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <div class="modal fade" id="demo-modal-edit" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
                        <!--Content-->
                        <div class="modal-content text-center">
                            <!--Header-->
                            <div class="modal-header d-flex justify-content-center">
                                <p class="bg-primary" style="padding:7px"><b>Schedule Template Detail</b></p>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <table class="table table-hover table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="min-width">Device</th>
                                        <th>Device Name</th>
                                        <th class="text-center">Template Title</th>
                                        <th class="text-center">Start Date & Time</th>
                                        <th class="text-center">End Date & Time</th>
                                        <th class="text-center">Ticker</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Video</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><i class="fa fa-desktop fa-3x text-warning"></i></td>
                                            <td id="deviceName" class="text-center"></td>
                                            <td id="templateTitle" class="text-center"></td>
                                            <td id="startDate" class="text-center"></td>
                                            <td id="endDate" class="text-center"></td>
                                            <td id="ticker-text" class="text-center"></td>
                                            <td id="logo" class="text-center">
                                                <a title="Click to view Image" id="link" href="" target="_blank"><i class="fa fa-image fa-3x text-warning"></i></a>
                                            </td>
                                            <td id="video" class="text-center">
                                                <a title="Click to view Video" id="link" href="" target="_blank"><i class="fa fa-video fa-3x text-warning"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer flex-center">
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.scripts')
<script src="{{asset('admin-assets/plugins/fullcalendar/lib/moment.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/fullcalendar/lib/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script>
    $('#statusContainer').hide();
    initialize_calender = function () {

        $("#demo-calendar").each(function () {
            var calender = $(this);
            calender.fullCalendar({
                header: {
                    language: 'en',
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,list'
                },
                slotDuration: '00:15:00',
                eventDurationEditable: true,
                selectable: true,
                selectHelper: true,
                navLinks: true,
                dayMaxEvents: true,
                editable: true,
                select: function (start, end, allDay) {

                    var check = moment(start).format('YYYY-MM-DD');
                    var today = moment(new Date()).format('YYYY-MM-DD');
                    console.log("check : " + check);
                    console.log("today : " + today);
                    if (check < today) {
                        return false;
                    }
                    {
                        $("#errorMessage").hide();
                        var devices = document.getElementsByClassName("jstree-clicked");

                        $("input[name='devices']").val("");
                        for (let i = 0; i < devices.length; i++) {

                            let id = devices[i].getAttribute("id");

                            let parent_branch = $("#" + id).parent().attr("data-parent_branch");
                            let device_id = $("#" + id).parent().attr("data-device-value");

                            if (typeof device_id != "undefined") {
                                let existing_value = $("input[name='devices']").val();
                                existing_value = existing_value + device_id + ",";

                                $("input[name='devices']").val(existing_value);
                            }
                        }
                        $('#demo-modal').modal('show');
                        $('#templateModalForm #start_date').val(start.format('YYYY-MM-DD'));
                        $('#templateModalForm #end_date').val(end.format('YYYY-MM-DD'));
                    }
                },
                eventDrop: function (event, delta, revertFunc) {
                    var check = moment(event.start).format('YYYY-MM-DD');
                    var today = moment(new Date()).format('YYYY-MM-DD');
                    console.log("check : " + check);
                    console.log("today : " + today);
                    if (check < today) {
                        alert('Cannot assign templates before current date');
                        window.location.reload();
                        return;
                    }
                    {
                        edit(event);
                    }
                },
                eventResize: function (event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
                    edit(event);
                },
                events:
                    [
                            <?php foreach($schedule as $event): ?>
                        {
                            id: '<?php echo $event->id; ?>',
                            device_name: '<?php echo $event->devices->device_name ?>',
                            title: '<?php echo $event->title ?>',
                            start: '<?php echo $event->start_date; ?>',
                            end: '<?php echo $event->end_date ?>',
                            ticker: '<?php echo $event->ticker ?>',
                            logo: '<?php echo $event->logo ?>',
                            video: '<?php echo $event->video ?>',
                        },
                        <?php endforeach; ?>
                    ],
                eventRender: function (event, element) {
                    element.find('.fc-content').append("<span class='btn btn-default pull-right btn-xs' data-templateId=" + event.id + " onClick='delete_event(" + event.id + ")'><i class='fa fa-times'></span>");
                    element.bind('click', function () {
                        console.log(event.ticker);
                        $("#deviceName").text(event.device_name);
                        $("#templateTitle").text(event.title);
                        $("#startDate").text(event.start);
                        $("#endDate").text(event.end);
                        $("#ticker-text").text(event.ticker);
                        $("#logo #link").attr("href",'/public'+event.logo);
                        $("#video #link").attr("href",'/public'+event.video);
                        $('#demo-modal-edit').modal('show');
                    })
                },
            });
        })
    };

    $("#templateModalForm").submit(function (event) {
        event.preventDefault();
        var title = $("#title").val();
        var logo = $("#logo").val();
        var video = $("#video").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('#csrf').val()
            },
            type: "POST",
            url: "{{url('ajax-data')}}",
            data: new FormData($("#templateModalForm")[0]),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(data){
                $("#loaderShowHide").show();
            },
            success: function (data) {
                $("#loaderShowHide").hide();
                if (data.status == false)
                    $("#errorMessage").text(data.message).show();
                if (data.status == true)
                    window.location.reload();
            }
        })

    })

    function edit(event) {

        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if (event.end) {
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        } else {
            end = start;
        }

        var Event = {
            id: event.id,
            start_date: event.start.format('YYYY-MM-DD HH:mm:ss'),
            end_date: event.end.format('YYYY-MM-DD HH:mm:ss'),
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('#csrf').val()
            },
            url: '{{url('ajax-data-update')}}',
            type: "POST",
            data: {event: Event},
            success: function (response) {
                if (response.status == true)
                    $("#statusContainer").show();
                $("#statusMessage").text('Updated Successfully');
            }
        })
    }

    function delete_event(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('#csrf').val()
            },
            url: '{{url('ajax-data-delete')}}',
            type: 'POST',
            data: {
                id: id
            },
            success: function (response) {
                if (response.status == true) {
                    alert("deleted successfully");
                    window.location.reload();
                }
            }
        })
    }
</script>
<script src="{{asset('admin-assets/js/schedule.js')}}"></script>
