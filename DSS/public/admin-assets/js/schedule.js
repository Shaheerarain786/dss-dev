$(document).ready(function () {
    $("#loaderShowHide").hide();

    $('#demo-jstree-1').jstree({
        'core': {
            'check_callback': true
        },
        'plugins': ['types', 'dnd'],
        'types': {
            'default': {
                'icon': 'fa fa-folder'
            },
            'devices' : {
                'icon' : 'fa fa-desktop'
            }
        }
    });

    $('#start_time').datetimepicker({
        format: 'LT'
    });
    $('#end_time').datetimepicker({
        format: 'LT'
    });
    //***************Define FUNCTIONS*************


    //***********CALL FUNCTION************
    initialize_calender();
});
