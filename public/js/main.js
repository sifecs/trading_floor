
$(document).on('click', '#add-coment', function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/coment',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $('.coment-form').serialize(),
    })
        .done(function( data ) {
            $('#text').text(' ');
            $('.error').text(' ');
            $("#createComents").removeClass('show');
        })
        .fail(function( jqXHR ) {
            $('.error').text(jqXHR.responseJSON.errors.text[0]);
        });

});












$(document).on('click', '#save-redact-description', function (e) {
    e.preventDefault();
    // let datas = $('#data-redact-description').text();
    // console.log(datas)
    $.ajax({
        type: 'POST',
        url: '/ajax/redactShopDescription',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {'data-redact-description': $('#data-redact-description').text() },
    })
        .done(function( data ) {
            $("#redact-description").removeClass('show');
            $("div.modal-backdrop").remove();
            $('#description').text(data.description);
        })
        .fail(function( jqXHR ) {
            console.log('ошибка')
            // $('.error').text(jqXHR.responseJSON.errors.text[0]);
        });

});















$(document).on('click','.coments .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    let product_id =  $(".coments").attr('data');
    getAjaxDate(page,`/ajax/Coments/${product_id}`,'coments')
});

$(document).on('click','.product-mine .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxDate(page,'/ajax/Products','product-mine')
});




function getAjaxDate (page, url, element) {
    $.ajax({
        url: `${url}?page=${page}`,
    })
        .done(function( data ) {
            $("."+element).html(data);
            // console.log(data );
        });
}

$(".main_input_file").change(function() {
    let f_name = [];
    for (let i = 0; i < $(this).get(0).files.length; ++i) {
        f_name.push(" " + $(this).get(0).files[i].name);
    }
    $("#f_name").val(f_name.join(", "));
});




