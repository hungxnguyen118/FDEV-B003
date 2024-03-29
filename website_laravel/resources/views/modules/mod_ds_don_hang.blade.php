<div class="container">
    <div class="container_ds_don_hang">
        <div class="list_ds_don_hang">
            @foreach($ds_don_hang as $don_hang)
            <div class="item_don_hang">
                <div class="title_item_don_hang">
                    mã đơn hàng {{$don_hang->id}} - {{$status_don_hang[$don_hang->trang_thai]}}
                    <a href="/don-hang/id/{{$don_hang->id}}">
                        <div class="btn btn-primary">Xem chi tiết đơn hàng</div>
                    </a>
                </div>
                <div class="list_item_sp">
                    @foreach($don_hang->ds_sp as $sp)
                    <div class="item_sp">
                        <div class="hinh_sp col-xs-3">
                            <img src="/images/sach/{{$sp->hinh}}" alt="">
                        </div>
                        <div class="ten_sp col-xs-4">
                            <a href="/sach/{{$sp->id_sach}}">
                                {{$sp->ten_sach}}
                            </a>
                        </div>
                        <div class="don_gia col-xs-2">
                            {{$sp->don_gia}}
                        </div>
                        <div class="col-xs-1">
                            {{$sp->so_luong}}
                        </div>
                        <div class="thanh_tien col-xs-2">
                            {{$sp->thanh_tien}}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tong_tien">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-4">
                    </div>
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-1">
                    </div>
                    <div class="col-xs-2">
                        {{$don_hang->tong_tien}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="detect_load_more" page='1'>
            <div class="loading" style="display: none;">
                <img src="/images/loading.png" alt="">
            </div>
        </div>
    </div>
</div>
<script>
    var flag_run = 0;

    $(() => {
        var screenheight = screen.height;
        $( window ).scroll(function() {
            //console.log($(window).scrollTop(), $('.detect_load_more').offset().top, screenheight * 2 / 3);
            if($(window).scrollTop() + (screenheight * 3 / 4) >= $('.detect_load_more').offset().top){
                if(flag_run == 0){
                    console.log('load new page');
                    flag_run = 1;
                    $('.loading').css({display: 'block'});
                    // setTimeout(() => {
                    //     flag_run = 0;
                    // }, 2000);

                    var cur_page = $('.detect_load_more').attr('page');

                    $.get('/api/don-hang/{{$email_don_hang}}/' + (cur_page * 1 + 1))
                        .then((data) => {

                            console.log(data);
                            if(data == 'stop'){
                                flag_run = 1;
                                $('.detect_load_more').css({display: 'none'});
                            }
                            else {
                                var html = '';

                                for(var i = 0; i < data.length; i++){
                                    html += `
                                    <div class="item_don_hang">
                                        <div class="title_item_don_hang">
                                            mã đơn hàng ${data[i].id} - giao thành công
                                            <a href="/don-hang/id/${data[i].id}">
                                                <div class="btn btn-primary">Xem chi tiết đơn hàng</div>
                                            </a>
                                        </div>
                                        <div class="list_item_sp">`
                                            
                                    
                                    for(var j = 0; j < data[i].ds_sp.length; j++){
                                        html +=         
                                            `<div class="item_sp">
                                                <div class="hinh_sp col-xs-3">
                                                    <img src="/images/sach/${data[i].ds_sp[j].hinh}" alt="">
                                                </div>
                                                <div class="ten_sp col-xs-4">
                                                    <a href="/sach/${data[i].ds_sp[j].id_sach}">
                                                        ${data[i].ds_sp[j].ten_sach}
                                                    </a>
                                                </div>
                                                <div class="don_gia col-xs-2">
                                                    ${data[i].ds_sp[j].don_gia}
                                                </div>
                                                <div class="thanh_tien col-xs-3">
                                                    ${data[i].ds_sp[j].thanh_tien}
                                                </div>
                                            </div>`
                                    }

                                            
                                    html +=
                                        `</div>
                                        <div class="tong_tien">
                                            <div class="col-xs-3">
                                            </div>
                                            <div class="col-xs-4">
                                            </div>
                                            <div class="col-xs-2">
                                            </div>
                                            <div class="col-xs-3">
                                                {{$don_hang->tong_tien}}
                                            </div>
                                        </div>
                                    </div>
                                    `
                                }
                                
                                $('.detect_load_more').attr('page', cur_page * 1 + 1);
                                $('.list_ds_don_hang').append(html);
                                $('.loading').css({display: 'none'});
                                flag_run = 0;
                            }
                        })
                }
            }
            else {

            }
        });
    })
</script>