<?php
if(isset($result)){
    notice_after_delete_database($result, 'Sửa thông tin loại sách thành công', 'có lỗi trong quá trình sửa loại sách', $_GET['page']);
}
?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa thông tin loại sách id <?= $_GET['id'] ?> </h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />


        <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-sm-10">
                    Tên loại sách:
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ten_loai_sach" value="<?php echo ($loai_sach_can_sua) ? $loai_sach_can_sua->ten_loai_sach : '' ?>" />
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Loại cha:
                </div>
                <div class="col-sm-10">
                    <select name="id_loai_cha" id="" class="form-control">
                        <option value="0">Không có loại cha</option>
                        <?php
                        for($i = 0; $i < count($ds_loai_sach_cap_1); $i++){
                            if($loai_sach_can_sua->id != $ds_loai_sach_cap_1[$i]->id){
                                ?>
                                <option <?php echo ($loai_sach_can_sua->id_loai_cha == $ds_loai_sach_cap_1[$i]->id) ? 'selected="selected"' : '' ?> value="<?= $ds_loai_sach_cap_1[$i]->id ?>"><?= $ds_loai_sach_cap_1[$i]->ten_loai_sach; ?></option>
                                <?php
                                if(count($ds_loai_sach_cap_1[$i]->ds_loai_sach_con)){
                                    foreach($ds_loai_sach_cap_1[$i]->ds_loai_sach_con as $loai_con){
                                        if($loai_sach_can_sua->id != $loai_con->id){
                                        ?>
                                        <option <?php echo ($loai_sach_can_sua->id_loai_cha == $loai_con->id) ? 'selected="selected"' : '' ?> value="<?= $loai_con->id ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?= $loai_con->ten_loai_sach; ?></option>
                                        <?php
                                        }
                                    }
                                }
                            }
                            
                        }
                        ?>
                    </select>
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Sắp xếp:
                </div>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="sap_xep" value="<?php echo ($loai_sach_can_sua) ? $loai_sach_can_sua->sap_xep : '' ?>" />
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Trạng thái:
                </div>
                <div class="col-sm-10">
                    <select name="trang_thai" id="" class="form-control">
                        <option value="1" <?php echo ($loai_sach_can_sua->trang_thai == 1) ? 'checked="checked"' : '' ?>>Hiển thị</option>
                        <option value="0" <?php echo ($loai_sach_can_sua->trang_thai == 0) ? 'checked="checked"' : '' ?>>Ẩn loại sách</option>
                    </select>
                    <p class="help-block">Help text here.</p>
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