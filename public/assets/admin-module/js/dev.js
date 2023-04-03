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
