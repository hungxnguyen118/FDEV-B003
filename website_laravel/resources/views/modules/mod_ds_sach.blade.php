<div class="ds_sach">

    @foreach($ds_sach as $sach)
        <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item_sp_noi_bat">
                <a href="chi_tiet_sach.php?id_sach=2">
                    <div class="hinh_sach">
                        <img src="images/sach/{{$sach->hinh}}">
                    </div>
                </a>
                <div class="thong_tin_tom_tat_sach"><a href="chi_tiet_sach.php?id_sach=2">
                        <div class="ten_sach">{{$sach->ten_sach}}</div>
                        <div class="tac_gia">{{$sach->ten_tac_gia}}</div>
                        <div class="don_gia_ban">{{$sach->don_gia}} ₫</div>
                        <div class="don_gia_bia">{{$sach->gia_bia}} ₫ </div>
                    </a><a href="them_vao_gio_hang.php?id_sach=2">
                        <div class="btn_mua_ngay">Mua Ngay</div>
                    </a>
                </div>

            </div>
        </div>
        @endforeach

</div>