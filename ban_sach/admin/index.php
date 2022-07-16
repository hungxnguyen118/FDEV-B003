<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once('libraries/function_support.php');

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$chuc_nang = (isset($_GET['chuc_nang'])) ? $_GET['chuc_nang'] : '';
//echo $page . ' - ' . $chuc_nang;

include_once('head.php');
?>

<body>
    <div id="wrapper">
        <?php
        include_once('header.php');

        include_once('sidebar.php');

        if ($page == 'sach') {
            include_once('../models/xl_sach.php');
            include_once('controller/c_sach.php');
            $controller = new c_sach($page);

            if ($chuc_nang) {
                $controller->$chuc_nang();
            } else {
                $controller->index();
            }
        } else {
            include_once('thong_ke/index.php');
        }
        ?>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <?php

    include_once('footer.php');
    ?>


</body>

</html>