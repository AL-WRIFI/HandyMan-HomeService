function ajax_get(route,id){
    $.get({
        url: route,
        dataType: 'json',
        data: {},
        beforeSend: function () {
            /*$('#loading').show();*/
        },
        success: function (response) {
        /* console.log(response.template) */
            $('#'+id).html(response.template);
        },
        complete: function () {
            /*$('#loading').hide();*/
        },
    });
}

function ajax_post(form_id,div_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let route = jQuery('#'+form_id).attr('action');
    var form = $('#'+form_id)[0];
    var formData = new FormData(form);

    console.log(route);

    $.post({
        url: route,
        data: formData,
        success: function(response) {
        console.log(response.template);
            $('#'+div_id).html(data.template);
        }
    });
}
