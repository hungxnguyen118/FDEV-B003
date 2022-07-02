<?php
$db = new PDO('mysql:host=localhost;dbname=ban_sach_online_db;charset=utf8', 'root', '');

if(isset($_GET['id_xoa'])){
    $sql_xoa = "DELETE FROM bs_sach WHERE id = " . $_GET['id_xoa'];
    $result = $db->exec($sql_xoa);
    if($result !== false){
        ?>
        <script>
            alert('Đã xóa sách có id <?php echo $_GET['id_xoa'] ?>');
        </script>
        <?php
    }
    else {
        ?>
        <script>
            alert('Bị lỗi trong quá trình xóa sách id <?php echo $_GET['id_xoa'] ?>');
        </script>
        <?php
    }
}

$sql = "SELECT * FROM bs_sach";
$sth = $db->prepare($sql);
$sth->execute();
$ds_sach = $sth->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    
    <!-- Latest compiled and minified CSS & JS -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <style>
        img.hinh_sach {
            max-width: 100px;
        }
    </style>

    <script>
        function check_notice(id_sach_can_xoa){
            var kq = confirm('Bạn có chắc chắn là muốn xóa sách có ID ' + id_sach_can_xoa);
            if(kq){
                window.location.href = '?id_xoa=' + id_sach_can_xoa;
            }
        }
    </script>
</head>

<body>



    <div id="wrapper">
        <?php
        include_once('../header.php');

        include_once('../sidebar.php');
        ?>

        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Quản lý Sách </h2>
                    </div>
                </div>
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
                            foreach($ds_sach as $sach){
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
                                        
                                        <a href="xu_ly.php?id=<?php echo $sach->id; ?>">
                                            <button type="button" class="btn btn-info">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </button>
                                        </a>
                                        <button onclick="check_notice(<?php echo $sach->id; ?>)" type="button" class="btn btn-danger">
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
                        $(document).ready( function () {
                            $('#table_sach').DataTable();
                        } );
                    </script>
                </div>
                
                

                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-lg-12">
                &copy; 2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
            </div>
        </div>
    </div>


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>