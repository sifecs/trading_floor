$(document).on('submit', function (e) {
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


$(document).on('click','.coments .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxDate(page,'/ajax/Coments/{{$product->id}}','coments')
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
