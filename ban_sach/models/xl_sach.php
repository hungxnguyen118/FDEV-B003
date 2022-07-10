<?php
include_once('database.php');
class xl_sach extends database{
    function load_danh_sach_sach($filter = ''){
        $sql = "SELECT * FROM bs_sach";
        if($filter){
            $sql .= " WHERE ten_sach LIKE '%$filter%' || gioi_thieu LIKE '%$filter%'";
        }
        $this->setQuery($sql);
        $ds_sach = $this->loadAllRow();
        return $ds_sach;
    }

    function load_thong_tin_sach($id_sach){
        $this->setQuery('SELECT * FROM bs_sach WHERE id = ' . $id_sach);
        $thong_tin_sach = $this->loadRow();
        return $thong_tin_sach;
    }

    function sua_sach($ten_sach, $gioi_thieu, $don_gia, $gia_bia, $trang_thai, $sku, $ten_hinh, $id_sach){
        $sql = "UPDATE bs_sach
            SET ten_sach = '$ten_sach',
            gioi_thieu = '$gioi_thieu',
            don_gia = '$don_gia',
            gia_bia = '$gia_bia',
            trang_thai = '$trang_thai',
            sku = '$sku',
            hinh = '$ten_hinh'
            WHERE id = " .  $id_sach;
        $result = $this->execute_sql($sql);
        return $result;
    }

    function them_sach($ten_sach, $gioi_thieu, $don_gia, $gia_bia, $trang_thai, $sku, $ten_hinh){
        $sql = "INSERT INTO bs_sach(ten_sach, gioi_thieu, don_gia, gia_bia, trang_thai, sku, hinh)
        VALUES('$ten_sach', '$gioi_thieu', $don_gia, $gia_bia, '$trang_thai', '$sku', '$ten_hinh')";
        $result = $this->execute_sql($sql);
        return $result;
    }

    function xoa_sach($id){
        $sql_xoa = "DELETE FROM bs_sach WHERE id = " . $id;
        $result = $this->execute_sql($sql_xoa);
        return $result;
    }
}
?>