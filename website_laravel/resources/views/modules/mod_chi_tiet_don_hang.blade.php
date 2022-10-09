<div class="container container_thong_tin_don_hang">
    <div class="title_don_hang">
        Chi tiết đơn hàng #{{$thong_tin_don_hang->id}} - {{$status_don_hang[$thong_tin_don_hang->trang_thai]}}
    </div>
    <div class="container_detail_info">
        <div class="col-xs-12 col-md-6">
            <div class="title_block">
                ĐỊA CHỈ NGƯỜI NHẬN
            </div>
            <div class="description_block">
                <div>{{$thong_tin_don_hang->ho_ten_nguoi_nhan}}</div>
                <div>{{$thong_tin_don_hang->dia_chi_nguoi_nhan}}</div>
                <div>Điện thoại: {{$thong_tin_don_hang->so_dien_thoai_nguoi_nhan}}</div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="title_block">
                HÌNH THỨC THANH TOÁN
            </div>
            <div class="description_block">
                Thanh toán tiền mặt khi nhận hàng
            </div>
        </div>
        <div class="col-xs-12">
            <div class="list_item_sp">
                @foreach($thong_tin_don_hang->ds_sp as $sp)
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
                    <div class="don_gia col-xs-1">
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
                    Tổng tiền
                </div>
                <div class="col-xs-4">
                </div>
                <div class="col-xs-2">
                </div>
                <div class="col-xs-1">
                </div>
                <div class="col-xs-2">
                    {{$thong_tin_don_hang->tong_tien}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var status_array = '{!!json_encode($status_don_hang, true)!!}';
    status_array = JSON.parse(status_array);

    $(() => {
        setInterval(() => {
            //console.log('test')
            $.get('/api/don-hang/notice?id_nguoi_dung={{session('user_info')->id}}&id_don_hang={{$thong_tin_don_hang->id}}')
                .then((data) => {
                    //console.log(data);
                    if(data.length){
                        var message = '';
                        for(var i = 0; i < data.length; i++){
                            message += `Đơn hàng ${data[i].id_don_hang} trạng thái đã thay đổi từ ${status_array[data[i].trang_thai_cu]} sang ${status_array[data[i].trang_thai_moi]} \r\n`
                        }

                        $('.title_don_hang').html(`Chi tiết đơn hàng #{{$thong_tin_don_hang->id}} - ${status_array[data[data.length - 1].trang_thai_moi]}`);
                        alert(message);
                    }
                })
        }, 3000);
    })
</script>