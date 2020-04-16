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

$(document).on('click', '.add-reservation', function (e) {
    e.preventDefault();
    let id_product = $(this).attr('data');
    postAjaxData ({'id_product': id_product } , '/ajax/addReservation')
        .done(function( data ) {
            console.log('успех');
            console.log(data);
            $('#add-reservation-wrap').remove();
        })
        .fail(function( jqXHR ) {
            console.log('ошика');
            console.log(jqXHR);
        });
});

$(document).on('click', '.add-favorites', function (e) {
    e.preventDefault();
    let id_product = $(this).attr('data');
    postAjaxData ({'id_product': id_product } , '/ajax/favoriteAdd')
        .done(function( data ) {
            console.log('успех');
            console.log(data);
            $(`.${id_product}`).remove();
        })
        .fail(function( jqXHR ) {
            console.log('ошика');
            console.log(jqXHR);
        });
});

$(document).on('click', '.cancellation-reservation', function (e) {
    e.preventDefault();
    let idReservation = $(this).attr('data').split('-');
    if (confirm('Вы диствительно хотите отменить бронь?')) {
        postAjaxData({'idProduct': idReservation[0], 'idUser': idReservation[1]}, '/ajax/cancellationReservation')
            .done(function (data) {
                $(`#cancellation-reservation_${data}`).remove();
            })
            .fail(function (jqXHR) {
                console.log('ошибка');
                console.log(jqXHR);
            });
    }
});

$(document).on('click','.product-mine .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxData(page,'/ajax/Products','.product-mine')
});

$(document).on('click','.product_favorite .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxData(page,'/ajax/ProductsFavorite','.product_favorite')
});

$(document).on('click','#products-reservation .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxData(page,'/ajax/productReservation','#products-reservation')
});

$(document).on('click','#profile-products-paginate .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getAjaxData(page,'/ajax/userShopProducts','#shop-user-products')
    getAjaxData(page,'/ajax/paginate','#profile-products-paginate')
});

$(document).on('click', '.set-privileges', function (e) {
    e.preventDefault();
    let idPrivileges = $(this).attr('data');
    let idProduct = $(this).parent().parent().attr('id');
    postAjaxData ({'idPrivileges': idPrivileges,'idProduct':idProduct } , '/ajax/setPrivileges')
        .done(function( data ) {
            console.log('успех');
            console.log(data);
            $(`#${idProduct}`).removeClass('vip');
            $(`#${idProduct}`).removeClass('highlight');
            $(`#${idProduct}`).addClass(data);
        })
        .fail(function( jqXHR ) {
            console.log('ошика');
            console.log(jqXHR);
        });
});

$(document).on('click', '.shop-set-privileges ', function (e) {
    e.preventDefault();
    let idPrivileges = $(this).attr('data');
    postAjaxData ({'idPrivileges': idPrivileges} , '/ajax/shopSetPrivileges')
        .done(function( data ) {
            console.log('успех');
            console.log(data);
        })
        .fail(function( jqXHR ) {
            console.log('ошика');
            console.log(jqXHR);
        });
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

    if (confirm('Вы диствительно хотите удалить товар?')) {
        postAjaxData({'idProduct': idProduct}, '/ajax/removeProduct')
            .done(function (data) {
                $(`#${data}`).remove();
                console.log(data);
            })
            .fail(function (jqXHR) {
                console.log('ошибка');
                console.log(jqXHR);
            });
    }
});


$(document).on('click', '.remove_message', function (e) {
    e.preventDefault();
    let idMessage = $(this).parent().attr('data');
    if (confirm('Вы диствительно хотите удалить данное сообщение?')) {
        postAjaxData({'idMessage': idMessage}, '/ajax/messageRemove')
            .done(function (data) {
                $(e.target).parent().remove();
                console.log(data);
            })
            .fail(function (jqXHR) {
                console.log('ошибка');
                console.log(jqXHR);
            });
    }
});



$(document).on('click', '.remove-favorite', function (e) {
    e.preventDefault();
    let idProduct = $(this).attr('data');
    if (confirm('Вы диствительно хотите удалить избранный товар?')) {
        postAjaxData({'idProduct': idProduct}, '/ajax/favoriteRemove')
            .done(function (data) {
                $(`#favorite_id_${data}`).remove();
                console.log(data);
            })
            .fail(function (jqXHR) {
                console.log('ошибка');
                console.log(jqXHR);
            });
    }
});

$(document).on('click','.search .pagination a', function (e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];

    var params = window
        .location
        .search
        .replace('?','')
        .split('&')
        .reduce(
            function(p,e){
                var a = e.split('=');
                p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                return p;
            },
            {}
        );

    $.ajax({
        url: `/ajax/search/?textSearch=${params.textSearch}&page=${page}`,
    })
        .done(function( data ) {
            // console.log(data)
            $('.search').html(data);
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


// let socket = new WebSocket("ws://hardproject");
//
// socket.onopen = function() {
//     alert("Соединение установлено.");
// };
//
// socket.onerror = function(error) {
//     console.log("Ошибка ");
//     console.log(error);
// };
//
// socket.onclose = function(event) {
//     console.log("Cоединение закрыто ");
// };
//
// socket.onmessage = function(event) {
//     console.log("Получены данные " + JSON.parse( event.data ));
// };
//
