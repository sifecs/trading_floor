$(document).on('click','.coments .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    let product_id =  $(".coments").attr('data');
    getAjaxData(page,`/ajax/Coments/${product_id}`,'.coments')
});

$(document).on('click', '#add-coment', function (e) {
    e.preventDefault();
    postAjaxData ($('.coment-form').serialize() , '/coment')
        .done(function( data ) {
            $('#text').text(' ');
            $('.error').text(' ');
            $("#createComents").removeClass('show');
        })
        .fail(function( jqXHR ) {
            $('.error').text(jqXHR.responseJSON.errors.text[0]);
        });
});

$(document).on('click','.product-mine .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxData(page,'/ajax/Products','.product-mine')
});

$(document).on('click','#profile-products-paginate .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    // console.log(page)
    getAjaxData(page,'/ajax/userShopProducts','#shop-user-products')
});

$(document).on('click','#profile-products-paginate .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxData(page,'/ajax/paginate','#profile-products-paginate')
});

$(document).on('click', '#save-redact-description', function (e) {
    e.preventDefault();
    postAjaxData ({'data-redact-description': $('#data-redact-description').text() }, '/ajax/redactShopDescription')
        .done(function( data ) {
            console.log(data)
            $("#redact-description").removeClass('show');
            $("div.modal-backdrop").remove();
            $('#description').text(data.description);
        })
        .fail(function( jqXHR ) {
            console.log('ошибка');
            console.log(jqXHR)
        });
});

$(document).on('click', '#save-user-data', function (e) {
    e.preventDefault();
    postAjaxData ($('#redact-user-form').serialize(), '/profile')
        .done(function( data ) {
            $('#errors').html();
            $('#user-full-name').text(`${data.surname} ' ' ${data.name} ' '  ${data.patronymic }`);
            $('#user-email').text(data.email);
            $('#user-phone').text(data.phone);
            $("#redact-user-data").removeClass('show');
            $("div.modal-backdrop").remove();
            console.log(data);
        })
        .fail(function( jqXHR ) {
            getErrors('#errors' , jqXHR);
        });
});

$(document).on('click', '#delete-img-file', function (e) {
    e.preventDefault();
    postAjaxData ('', '/ajax/removeImg')
        .done(function( data ) {
            $('#shop-img').attr('src', `uploads/${data}`);
            console.log(data);
        })
        .fail(function( jqXHR ) {
            console.log('ошибка');
            console.log(jqXHR);
        });
});

$(document).on('click', '.delete-product', function (e) {
    e.preventDefault();
    let idProduct = $(this).parent().parent().attr('id');

    postAjaxData ({'idProduct':idProduct}, '/ajax/removeProduct')
        .done(function( data ) {
            $(`#${data}`).remove();
            console.log(data);
        })
        .fail(function( jqXHR ) {
            console.log('ошибка');
            console.log(jqXHR);
        });
});

function getAjaxData (page, url, element) {
    $.ajax({
        url: `${url}?page=${page}`,
    })
        .done(function( data ) {
            // console.log(data)
            $(element).html(data);
        });
}

function postAjaxData (data, url, params= {'contentType': 'application/x-www-form-urlencoded; charset=UTF-8', 'processData': true}) {
    return $.ajax({
        type: 'POST',
        url: url,
        contentType: params.contentType,
        processData: params.processData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
    })
}

function getErrors(out, jqXHR) {
    let errorsArr = Object.values( jqXHR.responseJSON.errors);
    let errors = '';
    errorsArr.forEach(function(item, i, arr) {
        errors += `<li class="text-danger"> ${item.join() } </li> `;
    });
    $(out).html(errors);
}

$(".main_input_file").change(function(e) {
    e.preventDefault();
    let f_name = [];
    for (let i = 0; i < $(this).get(0).files.length; ++i) {
        f_name.push(" " + $(this).get(0).files[i].name);
    }
    $(this).parent().find('#f_name').val(f_name.join(", "));
});

$("#updata-img").change(function(e) {
    let formData = new FormData();
    formData.append('img', $('#updata-img')[0].files[0]);
    postAjaxData (formData, 'ajax/UpdateImg', {'contentType': false, 'processData': false})
        .done(function( data ) {
            $('#shop-img').attr('src', `uploads/${data}`);
            console.log(data);
        })
        .fail(function( jqXHR ) {
            console.log('ошибка');
            console.log(jqXHR);
        });
});


