<?php
if(isset($result)){
    notice_after_delete_database($result, 'Đã xóa loại sách có id ' . $_GET['id_xoa'], 'Bị lỗi trong quá trình xóa loại sách id ' . $_GET['id_xoa']);
}
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý loại sách </h2>
                <a href="?page=loai_sach&chuc_nang=them">
                    <button type="button" class="btn btn-large btn-block btn-primary">Thêm loại sách mới</button>
                </a>
            </div>
        </div>


        <form action="" method="POST" class="form-inline" role="form">

            <div class="form-group">
                <label class="sr-only" for="">label</label>
                <input type="text" value="<?php echo (isset($_POST['search'])) ? $_POST['search'] : ''; ?>" name="search" class="form-control" id="" placeholder="Input field">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- /. ROW  -->
        <hr />



        <div class="table-responsive">
            <table class="table table-hover table-striped" id="table_loai_sach">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên loại sách</th>
                        <th>ID loại cha</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ds_loai_sach as $loai_sach) {
                    ?>
                        <tr>
                            <td><?php echo $loai_sach->id; ?></td>
                            <td><?php echo $loai_sach->ten_loai_sach; ?></td>
                            <td><?php echo $loai_sach->id_loai_cha; ?></td>
                            <td><?php echo $loai_sach->trang_thai; ?></td>
                            <td>

                                <a href="?page=loai_sach&chuc_nang=sua&id=<?php echo $loai_sach->id; ?>">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <button onclick="check_notice(<?php echo $loai_sach->id; ?>, '<?= $page ?>')" type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>

                            </td>
                        </tr>
                    <?php
                        if(property_exists($loai_sach, 'ds_loai_sach_con')){
                            if(count($loai_sach->ds_loai_sach_con) > 0){
                                foreach($loai_sach->ds_loai_sach_con as $loai_con){
                                    ?>
                                    <tr>
                                        <td><?php echo $loai_con->id; ?></td>
                                        <td>|== <?php echo $loai_con->ten_loai_sach; ?></td>
                                        <td><?php echo $loai_con->id_loai_cha; ?></td>
                                        <td><?php echo $loai_con->trang_thai; ?></td>
                                        <td>

                                            <a href="?page=loai_sach&chuc_nang=sua&id=<?php echo $loai_con->id; ?>">
                                                <button type="button" class="btn btn-info">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                </button>
                                            </a>
                                            <button onclick="check_notice(<?php echo $loai_con->id; ?>, '<?= $page ?>')" type="button" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>

                                        </td>
                                    </tr>
                                    <?php
                                    if(property_exists($loai_sach, 'ds_loai_sach_con')){
                                        if(count($loai_con->ds_loai_sach_con) > 0){
                                            foreach($loai_con->ds_loai_sach_con as $loai_con_next){
                                                ?>
                                                <tr>
                                                    <td><?php echo $loai_con_next->id; ?></td>
                                                    <td>|== |== <?php echo $loai_con_next->ten_loai_sach; ?></td>
                                                    <td><?php echo $loai_con_next->id_loai_cha; ?></td>
                                                    <td><?php echo $loai_con_next->trang_thai; ?></td>
                                                    <td>
                
                                                        <a href="?page=loai_sach&chuc_nang=sua&id=<?php echo $loai_con_next->id; ?>">
                                                            <button type="button" class="btn btn-info">
                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                            </button>
                                                        </a>
                                                        <button onclick="check_notice(<?php echo $loai_con_next->id; ?>, '<?= $page ?>')" type="button" class="btn btn-danger">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                        </button>
                
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>

            <script>
                // $(document).ready( function () {
                //     $('#table_loai_sach').DataTable();
                // } );
            </script>
        </div>



        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>