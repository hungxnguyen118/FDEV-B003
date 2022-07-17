<?php
class c_sach {
    private $xl_sach, $page;

    function __construct($page = '')
    {
        $this->xl_sach = new xl_sach();
        $this->page = $page;
    }

    function index(){
        $page = $this->page;

        if (isset($_GET['id_xoa'])) {
            // $sql_xoa = "DELETE FROM bs_sach WHERE id = " . $_GET['id_xoa'];
            // $result = $db->exec($sql_xoa);
            echo $_GET['id_xoa'];
            $result = $this->xl_sach->xoa_sach($_GET['id_xoa']);
            
        }
        
        if (isset($_POST['search'])) {
            $ds_sach = $this->xl_sach->load_danh_sach_sach($_POST['search']);
        } else {
            $ds_sach = $this->xl_sach->load_danh_sach_sach();
        }

        include_once('view/ql_' . $this->page . '/index.php');
    }

    function them(){
        if (isset($_POST['ten_sach'])) {
            $ten_sach = $_POST['ten_sach'];
            $gioi_thieu = $_POST['gioi_thieu'];
            $don_gia = $_POST['don_gia'];
            $gia_bia = $_POST['gia_bia'];
            $trang_thai = $_POST['trang_thai'];
            $sku = $_POST['sku'];
        
            if (isset($_FILES['hinh'])) {
                $mang_ten_file = explode('.', $_FILES['hinh']['name']);
                $duoi_file = $mang_ten_file[count($mang_ten_file) - 1];
        
                $time = time();
                $ten_hinh = $mang_ten_file[0] . '-' . $time . '.' . $duoi_file;
        
                if ($duoi_file == 'jpg' || $duoi_file == 'png' || $duoi_file == 'gif' || $duoi_file == 'webp' || $duoi_file == 'svg' || $duoi_file == 'jpeg' || $duoi_file == 'ico') {
                    if ($_FILES['hinh']['size'] < 5244880) {
                        try {
                            move_uploaded_file($_FILES['hinh']['tmp_name'], '../images/' . $ten_hinh);
                            echo 'Đã upload thành công';
        
                            $result = $this->xl_sach->them_sach($ten_sach, $gioi_thieu, $don_gia, $gia_bia, $trang_thai, $sku, $ten_hinh);
                            
                        } catch (Exception $error) {
                            echo 'Upload thất bại ' . $error;
                        }
                    } else {
                        echo 'Đi nén dùm tôi, hình mà hơn 5MB ';
                    }
                } else {
                    echo 'File không hợp lệ ';
                }
            }
        } else {
        }

        include_once('view/ql_' . $this->page . '/them.php');
    }

    function sua(){
        if (isset($_GET['id'])) {
            $sach_can_sua = $this->xl_sach->load_thong_tin_sach($_GET['id']);
        
            if (isset($_POST['ten_sach'])) {
                $ten_sach = $_POST['ten_sach'];
                $gioi_thieu = $_POST['gioi_thieu'];
                $don_gia = $_POST['don_gia'];
                $gia_bia = $_POST['gia_bia'];
                $trang_thai = $_POST['trang_thai'];
                $sku = $_POST['sku'];
                $ten_hinh = $sach_can_sua->hinh;
        
                if (isset($_FILES['hinh'])) {
                    $mang_ten_file = explode('.', $_FILES['hinh']['name']);
                    $duoi_file = $mang_ten_file[count($mang_ten_file) - 1];
        
                    if ($duoi_file == 'jpg' || $duoi_file == 'png' || $duoi_file == 'gif' || $duoi_file == 'webp' || $duoi_file == 'svg' || $duoi_file == 'jpeg' || $duoi_file == 'ico') {
                        $time = time();
                        $ten_hinh = $mang_ten_file[0] . '-' . $time . '.' . $duoi_file;
        
                        if ($_FILES['hinh']['size'] < 5244880) {
                            try {
                                move_uploaded_file($_FILES['hinh']['tmp_name'], '../../images/' . $ten_hinh);
                                echo 'Đã upload thành công';
                            } catch (Exception $error) {
                                echo 'Upload thất bại ' . $error;
                            }
                        } else {
                            echo 'Đi nén dùm tôi, hình mà hơn 5MB ';
                        }
                    }
                }
        
                $result = $this->xl_sach->sua_sach($ten_sach, $gioi_thieu, $don_gia, $gia_bia, $trang_thai, $sku, $ten_hinh, $_GET['id']);
            }
        }

        include_once('view/ql_' . $this->page . '/sua.php');
    }
}
?>