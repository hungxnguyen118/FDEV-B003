<?php
if(isset($result)){
    notice_after_delete_database($result, 'Sửa thông tin sách thành công', 'có lỗi trong quá trình sửa sách', $_GET['page']);
}
?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa thông tin sách id <?= $_GET['id'] ?> </h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />


        <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-sm-10">
                    Tên sách:
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ten_sach" value="<?php echo ($sach_can_sua) ? $sach_can_sua->ten_sach : '' ?>" />
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Giới thiệu:
                </div>
                <div class="col-sm-10">
                    <textarea class="form-control" name="gioi_thieu"><?php echo ($sach_can_sua) ? $sach_can_sua->gioi_thieu : '' ?></textarea>
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Đơn giá:
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="don_gia" value="<?php echo ($sach_can_sua) ? $sach_can_sua->don_gia : '' ?>" />
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Giá bìa:
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gia_bia" value="<?php echo ($sach_can_sua) ? $sach_can_sua->gia_bia : '' ?>" />
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    SKU:
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sku" value="<?php echo ($sach_can_sua) ? $sach_can_sua->sku : '' ?>" />
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Trạng thái:
                </div>
                <div class="col-sm-10">
                    <select name="trang_thai" id="" class="form-control">
                        <option value="1" <?php if ($sach_can_sua) {
                                                if ($sach_can_sua->trang_thai == 1) echo 'checked="checked"';
                                            } ?>>Hiển thị</option>
                        <option value="0" <?php if ($sach_can_sua) {
                                                if ($sach_can_sua->trang_thai == 0) echo 'checked="checked"';
                                            } ?>>Ẩn sách</option>
                    </select>
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Hình:
                </div>
                <div class="col-sm-10">
                    <div class="image_review">
                        <img id="src_image_review" alt="" src="../../images/<?php echo ($sach_can_sua) ? $sach_can_sua->hinh : '' ?>" />
                    </div>
                    <input type="file" id="hinh" name="hinh" class="form-control" onchange="loadFile(event)" />
                    <p class="help-block">Help text here.</p>
                    <script>
                        var loadFile = function(event) {
                            var reader = new FileReader();
                            reader.onload = function() {
                                var output = document.getElementById('src_image_review');
                                output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        };
                    </script>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>


        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->