<?php
include_once('database.php');
class xl_loai_sach extends database{
    function load_danh_sach_loai_sach($filter = '', $id_loai_cha = false){
        $sql = "SELECT * FROM bs_loai_sach";
        if($filter){
            $sql .= " WHERE ten_loai_sach LIKE '%$filter%'";
        }

        if($id_loai_cha !== false){
            $sql .= " WHERE id_loai_cha = " . $id_loai_cha;
        }

        $this->setQuery($sql);
        $ds_loai_sach = $this->loadAllRow();
        //echo '<pre>',print_r($ds_loai_sach),'</pre>';
        return $ds_loai_sach;
    }

    function load_thong_tin_loai_sach($id_loai_sach){
        $this->setQuery('SELECT * FROM bs_loai_sach WHERE id = ' . $id_loai_sach);
        $thong_tin_loai_sach = $this->loadRow();
        return $thong_tin_loai_sach;
    }

    function sua_loai_sach($ten_loai_sach, $id_loai_cha, $sap_xep, $trang_thai, $id_loai_sach){
        $sql = "UPDATE bs_loai_sach
            SET ten_loai_sach = '$ten_loai_sach',
            id_loai_cha = '$id_loai_cha',
            sap_xep = '$sap_xep',
            trang_thai = '$trang_thai'
            WHERE id = " .  $id_loai_sach;
        $result = $this->execute_sql($sql);
        return $result;
    }

    function them_loai_sach($ten_loai_sach, $id_loai_cha, $sap_xep, $trang_thai){
        $sql = "INSERT INTO bs_loai_sach(ten_loai_sach, id_loai_cha, sap_xep, trang_thai)
        VALUES('$ten_loai_sach', $id_loai_cha, $sap_xep, $trang_thai)";
        //echo $sql;
        $result = $this->execute_sql($sql);
        return $result;
    }

    function xoa_loai_sach($id){
        $sql_xoa = "DELETE FROM bs_loai_sach WHERE id = " . $id;
        $result = $this->execute_sql($sql_xoa);
        return $result;
    }
}
?>