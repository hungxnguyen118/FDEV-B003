<?php
if(isset($result)){
    notice_after_delete_database($result, 'Đã xóa sách có id ' . $_GET['id_xoa'], 'Bị lỗi trong quá trình xóa sách id ' . $_GET['id_xoa']);
}
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý Sách </h2>
                <a href="?page=sach&chuc_nang=them">
                    <button type="button" class="btn btn-large btn-block btn-primary">Thêm sách mới</button>
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
            <table class="table table-hover table-striped" id="table_sach">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Hình</th>
                        <th>Đơn giá</th>
                        <th>Giá bìa</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ds_sach as $sach) {
                    ?>
                        <tr>
                            <td><?php echo $sach->id; ?></td>
                            <td><?php echo $sach->ten_sach; ?></td>
                            <td>
                                <img src="../../images/<?php echo $sach->hinh; ?>" alt="" class="hinh_sach">
                            </td>
                            <td><?php echo $sach->don_gia; ?></td>
                            <td><?php echo $sach->gia_bia; ?></td>
                            <td>

                                <a href="?page=sach&chuc_nang=sua&id=<?php echo $sach->id; ?>">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <button onclick="check_notice(<?php echo $sach->id; ?>, '<?= $page ?>')" type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <script>
                // $(document).ready( function () {
                //     $('#table_sach').DataTable();
                // } );
            </script>
        </div>



        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>