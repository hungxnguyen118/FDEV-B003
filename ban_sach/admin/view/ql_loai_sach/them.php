<?php
if(isset($result)){
    notice_after_delete_database($result, 'Thêm loại sách mới thành công', 'có lỗi trong quá trình thêm', $_GET['page']);
}
?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm loại sách mới </h2>
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
                    <input type="text" class="form-control" name="ten_loai_sach" value="" />
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
                            ?>
                            <option value="<?= $ds_loai_sach_cap_1[$i]->id ?>"><?= $ds_loai_sach_cap_1[$i]->ten_loai_sach; ?></option>
                            <?php
                            if(count($ds_loai_sach_cap_1[$i]->ds_loai_sach_con)){
                                foreach($ds_loai_sach_cap_1[$i]->ds_loai_sach_con as $loai_con){
                                    ?>
                                    <option value="<?= $loai_con->id ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?= $loai_con->ten_loai_sach; ?></option>
                                    <?php
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
                    <input type="number" class="form-control" name="sap_xep" value="" />
                    <p class="help-block">Help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    Trạng thái:
                </div>
                <div class="col-sm-10">
                    <select name="trang_thai" id="" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn loại sách</option>
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