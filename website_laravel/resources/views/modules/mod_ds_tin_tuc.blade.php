<section class="ds_sp_noi_bat container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="title_module">
                Tin tức
            </div>

            @foreach($ds_tin_tuc as $key => $tin_tuc)
            @if($key % 2 == 0)
            <div class="row">
            @endif
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tin_tuc_block">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 hinh_tin_tuc">
                        <img src="images/tin_tuc/{{$tin_tuc->hinh_dai_dien}}">
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 thong_tin_mo_ta_tin_tuc">
                        <a href="/tin-tuc/{{$tin_tuc->id}}">
                            <div class="tieu_de_tin">
                                {{$tin_tuc->tieu_de_tin}} </div>
                        </a>
                        <div class="mo_ta_tom_tat">
                            {{$tin_tuc->noi_dung_tom_tat}} </div>
                    </div>
                </div>
            @if($key % 2 == 1)
            </div>
            @endif
            @endforeach


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="pagination">
                    <li class="active"><a class="number"><b>1</b></a> </li>
                    <li><a class="number" href="/web_ban_sach_php_thuan/tin_tuc_blog.php?page=2" title="Trang 2">2</a>
                    </li>
                    <li><a class="number" href="/web_ban_sach_php_thuan/tin_tuc_blog.php?page=3" title="Trang 3">3</a>
                    </li>
                    <li><a class="number" href="/web_ban_sach_php_thuan/tin_tuc_blog.php?page=2"
                            title="Dến trang sau">&gt;</a></li>
                    <li><a class="number" href="/web_ban_sach_php_thuan/tin_tuc_blog.php?page=3"
                            title="Trang cuối">&gt;&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>