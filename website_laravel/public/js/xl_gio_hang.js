//console.log('xu ly');

function process_change_item_gio_hang(e, id_sach){
    //console.log(id_sach);
    //console.log(e.target.value);
    var so_luong = e.target.value;

    if(so_luong > 0){
        var token = $('input[name="_token"]').val();
        $.ajax({
            url: "/cart/" + id_sach,
            method: "PUT",
            data: { so_luong : so_luong, _token: token },
        })
        .done((data) => {
            //console.log(data);
            //console.log('test');
            update_tong_so_luong_gio_hang(data);
            update_table_cart(data, id_sach);
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        })
    }
    else {
        var kq = confirm('Bạn muốn xóa sản phẩm ' + id_sach + ' khỏi giỏ hàng phải không?');
        if(kq){
            //xử lý xóa
            var token = $('input[name="_token"]').val();
            $.ajax({
                url: "/cart/" + id_sach,
                method: "DELETE",
                data: { _token: token },
            })
            .done((data) => {
                //console.log(data);
                $('#item_' + id_sach).remove();
                update_tong_so_luong_gio_hang(data);
                update_table_cart(data, id_sach);
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            })
        }
        else {
            e.target.value = 1;
        }
    }
    
}

function process_destroy_cart(){
    var kq = confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng không?');
    if(kq){
        var token = $('input[name="_token"]').val();
        $.ajax({
            url: "/cart",
            method: "DELETE",
            data: { _token: token },
        })
        .done((data) => {
            console.log(data);
            var div_notice = `
                <div class="notice">
                Không có sản phẩm nào trong giỏ hàng
                </div>
            `
            $('.table_form_gio_hang').html(div_notice);
            $('.number_item_in_cart').html('').css({'display': 'none'});
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
    }
}

function update_table_cart(data, id_sach){
    var tong_tien = 0;
    for(i = 0; i < data.length; i++){
        tong_tien += data[i].so_luong * data[i].don_gia;
        if(data[i].id == id_sach){
            $('#thanh_tien_' + id_sach).html((data[i].so_luong * data[i].don_gia).format(0, 3, '.', ',') + ' đ');
        }
    }

    $('#tong_tien').html(tong_tien.format(0, 3, '.', ',')+ ' đ')
}


Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};

// function formatMoney(number, decPlaces, decSep, thouSep) {
//     decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
//     decSep = typeof decSep === "undefined" ? "," : decSep;
//     thouSep = typeof thouSep === "undefined" ? "." : thouSep;
//     var sign = number < 0 ? "-" : "";
//     var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
//     var j = (j = i.length) > 3 ? j % 3 : 0;

//     return sign +
//         (j ? i.substr(0, j) + thouSep : "") +
//         i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
//         (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
// }