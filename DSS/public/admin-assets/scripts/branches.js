$(document).ready(function () {

    $("#branches").DataTable();

    let branches_modal = $("#assignBranches");

    $('#branch_to_device_group').select2({
        dropdownParent: branches_modal,
        placeholder: "Select Branch"
    });

    $('#device_group_to_branch').select2({
        dropdownParent: branches_modal,
        placeholder: "Select Device Groups"
    });

    /************ DataTables *****************/
    $("#branches").DataTable();

    $('#assign-device-group-to-device').on('change', function () {
        $('#assign').prop('disabled', !$(this).val());
    }).trigger('change');
});
