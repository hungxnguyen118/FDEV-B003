<section class="chi_tiet_sach">
    <div class="row thong_tin_co_ban_sach">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="title_module">
                {{$thong_tin_sach->ten_sach}} 
            </div>
        </div>

        <form action="them_vao_gio_hang.php" method="post">
            <div class="col-md-4 col-lg-4">
                <div class="thong_tin_hinh">
                    <div class="chi_tiet_hinh">
                        <img src="images/sach/{{$thong_tin_sach->hinh}} " alt="" title="">
                    </div>
                    @if($doc_thu)
                    <div class="doc_thu_sach" data-toggle="modal" href="#modal-id">Đọc thử</div>
                    @endif
                </div>
            </div>
            <div class="col-md-8 col-lg-8">
                <div class="thong_tin_sach">
                    <div class="tac_gia">
                        <span>Tác giả: </span> {{$thong_tin_sach->ten_tac_gia}} 
                    </div>
                    <div class="gia_ban">
                        <span>Giá bán tại Bookstore: </span>{{$thong_tin_sach->don_gia}}  ₫
                    </div>
                    <div>
                        <span>Giá bìa: </span><span class="gia_bia">{{$thong_tin_sach->gia_bia}}  ₫</span>
                    </div>
                    <div class="div_chua_btn_dat_hang">
                        <input type="hidden" name="id_sach" value="20">
                        <input type="number" name="so_luong_mua" value="1" min="1" max="10">
                        <input type="submit" class="btn_dat_mua" value="Thêm vào giỏ hàng">
                    </div>

                    <!-- facebook like share -->
                    {{-- <div class="fb-like fb_iframe_widget"
                        data-href="http://locahost:81/web_ban_sach_php_thuan/chi_tiet_sach.php" data-layout="standard"
                        data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered"
                        fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=1219&amp;href=http%3A%2F%2Flocahost%3A81%2Fweb_ban_sach_php_thuan%2Fchi_tiet_sach.php&amp;layout=standard&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=true">
                        <span style="vertical-align: bottom; width: 450px; height: 28px;"><iframe name="f1cd3a5e16919b"
                                width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin"
                                title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true"
                                allowfullscreen="true" scrolling="no" allow="encrypted-media"
                                src="https://www.facebook.com/v2.5/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df167475705fb4%26domain%3Dlocalhost%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff3a134a7f218c54%26relation%3Dparent.parent&amp;container_width=1219&amp;href=http%3A%2F%2Flocahost%3A81%2Fweb_ban_sach_php_thuan%2Fchi_tiet_sach.php&amp;layout=standard&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=true"
                                style="border: none; visibility: visible; width: 450px; height: 28px;"
                                class=""></iframe></span></div>
                    <div id="fb-root" class=" fb_reset">
                        <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
                            <div></div>
                        </div>
                    </div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script> --}}
                    <!-- END facebook like share -->


                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v15.0" nonce="kG29eYGe"></script>

                    <div class="fb-share-button" data-href="{{$url_share}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php" class="fb-xfbml-parse-ignore">Share</a></div>

                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw&text=Sách '{{$thong_tin_sach->ten_sach}}' hay lắm nè" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                
                    <div class="cac_thong_tin_khac">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td style="width: 300px;">Nhà xuất bản: </td>
                                    <td>NXB Văn Học</td>
                                </tr>


                                <tr>
                                    <td style="width: 300px;">Mã SKU: </td>
                                    <td> {{$thong_tin_sach->sku}} </td>
                                </tr>

                                <tr>
                                    <td style="width: 300px;">Trọng lượng vận chuyển (gram): </td>
                                    <td>{{$thong_tin_sach->trong_luong}} </td>
                                </tr>

                                <tr>
                                    <td style="width: 300px;">Ngày xuất bản: </td>
                                    <td> {{$thong_tin_sach->ngay_xuat_ban}} </td>
                                </tr>

                                <tr>
                                    <td style="width: 300px;">Thuộc thể loại: </td>
                                    <td>Huyền Bí - Giả Tưởng</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="thanh_ngan_cach_module"></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 gioi_thieu_sach">
        {!!$thong_tin_sach->gioi_thieu!!} 
    </div>

    <!-- facebook comment -->
    {{-- <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop"
        data-href="http://localhost:8000/{{$url_share}}" data-numposts="5"
        fb-xfbml-state="rendered"
        fb-iframe-plugin-query="app_id=&amp;container_width=1873&amp;height=100&amp;href=http%3A%2F%2Flocalhost%2Fweb_ban_sach_php_thuan%2Fchi_tiet_sach.php%3Fid_sach%3D20&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.5&amp;width=550">
        <span style="vertical-align: bottom; width: 550px; height: 204px;"><iframe name="f1751d65915d10c" width="550px"
                height="100px" data-testid="fb:comments Facebook Social Plugin"
                title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true"
                allowfullscreen="true" scrolling="no" allow="encrypted-media"
                src="https://www.facebook.com/v2.5/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df270886db5ea63c%26domain%3Dlocalhost%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Flocalhost:8000%252Ff3a134a7f218c54%26relation%3Dparent.parent&amp;container_width=1873&amp;height=100&amp;href=http://localhost:8000/{{$url_share}}&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.5&amp;width=550"
                style="border: none; visibility: visible; width: 550px; height: 204px;" class=""></iframe></span></div>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script> --}}
    <!-- END facebook comment -->

    
    <div class="fb-comments" data-href="{{$url_share}}" data-width="500" data-numposts="5"></div>

</section>


<div class="modal" id="modal-id" style="">
    <div class="modal-dialog ">
        <div class="modal-content">
            <button type="button" class="close dong_doc_thu" data-dismiss="modal">×</button>
            <div class="modal-body sach_doc_thu">
                {!! $doc_thu !!}
            </div>
        </div>
    </div>
</div>