$(document).ready(function () {

    let assign_model_Id = $("#assignCity");

    $('#assign-branches-to-city').select2({
        dropdownParent: assign_model_Id,
        placeholder: "Select Branches to City"
    });

    $('#assign-city-to-branch').select2({
        dropdownParent: assign_model_Id,
        placeholder: "Select City to branch"
    });

    /************ DataTables *****************/
    $("#branches").DataTable();
});
