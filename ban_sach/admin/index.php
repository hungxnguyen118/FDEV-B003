<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
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
        ?>
        <?php
        if ($page == 'sach') {
            include_once('../models/xl_sach.php');
            if ($chuc_nang == 'them' || $chuc_nang == 'sua') {
                include_once('ql_' . $page . '/xu_ly.php');
            } else {
                include_once('ql_' . $page . '/index.php');
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