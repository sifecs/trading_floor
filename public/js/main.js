$(document).on('click', '#add-coment', function (e) {
    e.preventDefault();
    postAjaxDate ($('.coment-form').serialize() , '/coment')
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
    postAjaxDate ({'data-redact-description': $('#data-redact-description').text() }, '/ajax/redactShopDescription')
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
    postAjaxDate ($('#redact-user-form').serialize(), '/profile')
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
    postAjaxDate ('', '/ajax/removeImg')
        .done(function( data ) {
            $('#shop-img').attr('src', `uploads/${data}`);
            console.log(data);
        })
        .fail(function( jqXHR ) {
            console.log('ошибка');
            console.log(jqXHR);
        });
});

// $(document).on('submit', '#add-shop', function (e) {
//     e.preventDefault();
//     let formms = document.forms.test;
//     let formData = new FormData(formms);
//     formData.append('img', $('#image')[0].files[0]);
//
//     postAjaxDate (formData, '/addShop', {'contentType': false})
//         .done(function( data ) {
//             $('#errors-add-shop').html(' ');
//             $("#add-shop").removeClass('show');
//             $("div.modal-backdrop").remove();
//             // console.log(data);
//         })
//         .fail(function( jqXHR ) {
//             getErrors('#errors-add-shop' , jqXHR)
//         });
// });

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
        });
}

function postAjaxDate (date, url, params= {'contentType': 'application/x-www-form-urlencoded; charset=UTF-8', 'processData': true}) {
    return $.ajax({
        type: 'POST',
        url: url,
        contentType: params.contentType,
        processData: params.processData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: date,
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
    $("#f_name").val(f_name.join(", "));

    // $('#update-img').submit();

    let formData = new FormData();
    formData.append('img', $('#updata-img')[0].files[0]);

    postAjaxDate (formData, 'ajax/UpdateImg', {'contentType': false, 'processData': false})
        .done(function( data ) {
            $('#shop-img').attr('src', `uploads/${data}`);
            console.log(data);
        })
        .fail(function( jqXHR ) {
            console.log('ошибка');
            console.log(jqXHR);
        });
});




