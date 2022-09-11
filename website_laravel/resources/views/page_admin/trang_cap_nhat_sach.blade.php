@extends('templates.template_admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Thêm sách mới</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/admin/">Home</a></li>
            <li><i class="icon_document_alt"></i>QL sách</li>
            <li><i class="fa fa-file-text-o"></i>Thêm sách</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Form Thêm sách
            </header>
            @if(session('NoticeSuccess'))
                <script>
                    alert('{{ session('NoticeSuccess') }}');
                </script>
            @endif

            @if(session('NoticeError'))
                <script>
                    alert('{{ session('NoticeError') }}');
                </script>
            @endif
            <div class="panel-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="col-sm-2 control-label">SKU</label>
                        <div class="col-sm-10">
                            <input name="sku" type="text" value="{{$thong_tin_sach->sku}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên sách</label>
                        <div class="col-sm-10">
                            <input name="ten_sach" type="text" value="{{$thong_tin_sach->ten_sach}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">URL file đọc thử</label>
                        <div class="col-sm-10">
                            <input name="doc_thu" type="text" value="{{$thong_tin_sach->doc_thu}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Số trang</label>
                        <div class="col-sm-10">
                            <input name="so_trang" type="text" value="{{$thong_tin_sach->so_trang}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ngày xuất bản</label>
                        <div class="col-sm-10">
                            <input name="ngay_xuat_ban" type="date" value="{{$thong_tin_sach->ngay_xuat_ban}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kích thước</label>
                        <div class="col-sm-10">
                            <input name="kich_thuoc" type="text" value="{{$thong_tin_sach->kich_thuoc}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Trọng lượng</label>
                        <div class="col-sm-10">
                            <input name="trong_luong" type="text" value="{{$thong_tin_sach->trong_luong}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Đơn giá</label>
                        <div class="col-sm-10">
                            <input name="don_gia" type="text" value="{{$thong_tin_sach->don_gia}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Giá bìa</label>
                        <div class="col-sm-10">
                            <input name="gia_bia" type="text" value="{{$thong_tin_sach->gia_bia}}" class="form-control round-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tác giả</label>
                        <div class="col-sm-10">
                            <select name="id_tac_gia" id="" class="form-control round-input">
                                @foreach($ds_tac_gia as $tac_gia)
                                    <option value="{{$tac_gia->id}}" @if($tac_gia->id == $thong_tin_sach->id_tac_gia) checked="checked" @endif>
                                        {{$tac_gia->ten_tac_gia}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Loại sách</label>
                        <div class="col-sm-10">
                            <select name="id_loai_sach" id="" class="form-control round-input">
                                @foreach($ds_loai_sach as $loai_sach)
                                    <option value="{{$loai_sach->id}}" @if($loai_sach->id == $thong_tin_sach->id_loai_sach) checked="checked" @endif>
                                        {{$loai_sach->ten_loai_sach}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nhà xuất bản</label>
                        <div class="col-sm-10">
                            <select name="id_nha_xuat_ban" id="" class="form-control round-input">
                                @foreach($ds_nxb as $nxb)
                                    <option value="{{$nxb->id}}"  @if($nxb->id == $thong_tin_sach->id_nha_xuat_ban) checked="checked" @endif>
                                        {{$nxb->ten_nha_xuat_ban}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Trạng thái</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="trang_thai" id="trang_thai" value="1" @if( $thong_tin_sach->trang_thai == 1) checked @endif>
                                    Hiển thị
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="trang_thai" id="trang_thai" value="0" @if( $thong_tin_sach->trang_thai == 0) checked @endif>
                                    Ẩn, Private
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nổi bật</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="noi_bat" id="noi_bat" value="1"  @if( $thong_tin_sach->noi_bat == 1) checked @endif>
                                    Nổi bật
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="noi_bat" id="noi_bat" value="0" @if( $thong_tin_sach->noi_bat == 0) checked @endif>
                                    Không nổi bật
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Hình</label>
                        <div class="col-sm-10">
                            <input name="hinh" id="hinh" type="file" class="form-control round-input">
                        </div>

                        <div class="hinh_tam">
                            <input type="hidden" name="hinh_tam" value="{{$thong_tin_sach->hinh}}">
                            <img src="/images/sach/{{$thong_tin_sach->hinh}}" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Giới thiệu</label>
                        <div class="col-sm-10">
                            <textarea name="gioi_thieu" id="gioi_thieu" rows="10" class="form-control">{{$thong_tin_sach->gioi_thieu}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-info">Lưu sách</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@stop