<div class="table-responsive table_form_gio_hang">
    @if(session()->has('gio_hang'))
    <form action="" method="post" name="form_gio_hang">
        @csrf
        <table class="table table-hover gio_hang">
            <thead>
                <tr>
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                
                @if(session()->has('gio_hang'))
                    @foreach(session('gio_hang') as $item_gio_hang)
                    <tr id="item_{{$item_gio_hang->id}}">
                        <td>{{$item_gio_hang->sku}}</td>
                        <td style="min-width: 100px;"><a href="/sach/{{$item_gio_hang->id}}">
                            {{$item_gio_hang->ten_sach}}</a></td>
                        <td>{{$item_gio_hang->don_gia}} ₫</td>
                        <td><input type="number" onchange="process_change_item_gio_hang(event, '{{$item_gio_hang->id}}')" name="so_luong[]" value="{{$item_gio_hang->so_luong}}"></td>
                        <td id="thanh_tien_{{$item_gio_hang->id}}" style="text-align: right;">{{$item_gio_hang->so_luong * $item_gio_hang->don_gia}} ₫</td>
                    </tr>
                    @endforeach
                @endif

                <tr class="tong_tien">
                    <td colspan="4" style="text-align: right;">Tổng cộng: </td>
                    <td id="tong_tien" style="text-align: right;">{{$tong_tien}} ₫</td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="ds_nut_dieu_khien">
                            {{-- <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>
                                Cập nhật</button> --}}
                            <div onclick="process_destroy_cart()" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy giỏ
                                hàng</div>
                            <a href="trang_thanh_toan.php">
                                <div class="btn btn-primary"><span class="glyphicon glyphicon-credit-card"></span> Thanh
                                    toán</div>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    @else
    <div class="notice">
        Không có sản phẩm nào trong giỏ hàng
    </div>
    @endif
    
</div>

<script src="/js/xl_gio_hang.js"></script>