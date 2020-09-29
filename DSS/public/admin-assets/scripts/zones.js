$(document).ready(function () {

    $("#branches").DataTable();

    $(document).find('.sorting_asc').removeClass('sorting_asc');

    $('#assign-org-dropdown').select2({
        dropdownParent: $('#assign_zones'),
        placeholder: "Select Zone",
    });

    $('#assign-city-dropdown').select2({
        dropdownParent: $('#assign_zones'),
        placeholder: "Select Multiple Cities",
    });


    $("#message").hide();

    $(".checkBoxMain").change(function (e) {
        e.preventDefault();

        $(document).find('.sorting_asc').removeClass('sorting_asc');

        $(".magic-checkbox").prop("checked", $(this).prop("checked"))
    })

    $("#deleteBtn").click(function (e) {
        e.preventDefault()

        var data_array = []

        $.each($(".magic-checkbox:checked"),function () {
            let id = $(this).val();
            if(id.length > 0)
            {
                data_array.push(id)
            }
        })

        if(confirm("Are you sure you want to delete")){
            $.ajax({
                type: "POST",
                url: '/ajax-delete-zones',
                data: {
                    zones: data_array
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (response) {
                    console.log(response.message);
                    $("#message strong").text(response.message);
                    $("#message").show();

                    setTimeout(function () {
                        window.location.reload()
                    },2000)
                },
                error:function (error) {
                    console.log(error)
                }
            })
        }
    })


    $('input:checkbox:checked').click(function () {
        console.log($(this).val());
    })


    //Datatables
})
