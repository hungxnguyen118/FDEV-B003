//console.log('main js');


function process_add_to_cart(e, id_sach){
    e.preventDefault();
    //console.log(id_sach);
    //console.log($('input[name="_token"]').val());\
    var token = $('input[name="_token"]').val();

    $.post('/cart', {id_sach: id_sach, _token: token})
        .done((data) => {
            //console.log(data);
            update_tong_so_luong_gio_hang(data);
            $('.number_item_in_cart').css({'display': 'block'})
        })
        .fail((err) => {
            console.log(err);
        })
}

function update_tong_so_luong_gio_hang(data){
    var tong_so_luong = 0;
    for(var i = 0; i < data.length; i++){
        tong_so_luong += data[i].so_luong * 1;
    }

    $('.number_item_in_cart').html(tong_so_luong);
}