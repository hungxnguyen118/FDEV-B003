<!-- list sách mới -->
<section class="ds_sp_noi_bat container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="title_module">
                Sách mới
            </div>
            @foreach($ds_sach_moi as $sach_moi)
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item_sp_noi_bat">
                    <a href="/sach/{{$sach_moi->id}}">
                        <div class="hinh_sach">
                            <img src="images/sach/{{$sach_moi->hinh}}">
                        </div>
                    </a>
                    <div class="thong_tin_tom_tat_sach"><a href="/sach/{{$sach_moi->id}}">
                            <div class="ten_sach">{{$sach_moi->ten_sach}}</div>
                            <div class="tac_gia">J. K. Rowling</div>
                            <div class="don_gia_ban">{{$sach_moi->don_gia}} ₫</div>
                            <div class="don_gia_bia">{{$sach_moi->gia_bia}} ₫ </div>
                        </a><a href="them_vao_gio_hang.php?id_sach=2">
                            <div class="btn_mua_ngay" onclick="process_add_to_cart(event, '{{$sach_moi->id}}')">Mua Ngay</div>
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> <!-- END list sách mới -->