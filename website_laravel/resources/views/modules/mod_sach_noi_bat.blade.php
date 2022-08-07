<!-- list ds sản phẩm nổi bật -->
<section class="ds_sp_noi_bat container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="title_module">
                Sách nổi bật
            </div>
            @foreach($ds_sach_noi_bat as $sach_noi_bat)
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item_sp_noi_bat">
                    <a href="chi_tiet_sach.php?id_sach=2">
                        <div class="hinh_sach">
                            <img src="images/sach/{{$sach_noi_bat->hinh}}">
                        </div>
                    </a>
                    <div class="thong_tin_tom_tat_sach"><a href="chi_tiet_sach.php?id_sach=2">
                            <div class="ten_sach">{{$sach_noi_bat->ten_sach}}</div>
                            <div class="tac_gia">J. K. Rowling</div>
                            <div class="don_gia_ban">{{$sach_noi_bat->don_gia}} ₫</div>
                            <div class="don_gia_bia">{{$sach_noi_bat->gia_bia}} ₫ </div>
                        </a><a href="them_vao_gio_hang.php?id_sach=2">
                            <div class="btn_mua_ngay">Mua Ngay</div>
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> <!-- END list ds sản phẩm nổi bật -->