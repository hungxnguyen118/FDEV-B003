<?php
class c_loai_sach {
    private $xl_loai_sach, $page;

    function __construct($page = '')
    {
        $this->xl_loai_sach = new xl_loai_sach();
        $this->page = $page;
    }

    function index(){
        $page = $this->page;

        $ds_loai_sach_cap_1 = $this->xl_loai_sach->load_danh_sach_loai_sach('', 0);
        foreach($ds_loai_sach_cap_1 as $key => $loai_sach_cap_1){
            $ds_loai_cha_cap_2 = $this->xl_loai_sach->load_danh_sach_loai_sach('', $loai_sach_cap_1->id);

            if(count($ds_loai_cha_cap_2) > 0){
                foreach($ds_loai_cha_cap_2 as $key_loai_con => $loai_cha_cap_2){
                    $ds_loai_cha_cap_3 = $this->xl_loai_sach->load_danh_sach_loai_sach('', $loai_cha_cap_2->id);
                    //echo '<pre>',print_r($ds_loai_cha_cap_3),'</pre>';
                    $ds_loai_cha_cap_2[$key_loai_con]->ds_loai_sach_con = $ds_loai_cha_cap_3;
                    //echo '<pre>',print_r($ds_loai_cha_cap_2[$key]),'</pre>';
                    // $ds_loai_cha_cap_2[$key]->ds_loai_sach_con = 'test';
                    // echo '<pre>',print_r($ds_loai_cha_cap_2[$key]),'</pre>';
                }
                
            }

            $ds_loai_sach_cap_1[$key]->ds_loai_sach_con = $ds_loai_cha_cap_2;
        }
        //echo '<pre>',print_r($ds_loai_sach_cap_1),'</pre>';

        if (isset($_GET['id_xoa'])) {
            // $sql_xoa = "DELETE FROM bs_loai_sach WHERE id = " . $_GET['id_xoa'];
            // $result = $db->exec($sql_xoa);
            echo $_GET['id_xoa'];
            $result = $this->xl_loai_sach->xoa_loai_sach($_GET['id_xoa']);
            
        }
        
        if (isset($_POST['search'])) {
            $ds_loai_sach = $this->xl_loai_sach->load_danh_sach_loai_sach($_POST['search']);
        } else {
            //$ds_loai_sach = $this->xl_loai_sach->load_danh_sach_loai_sach();
            $ds_loai_sach = $ds_loai_sach_cap_1;
        }

        include_once('view/ql_' . $this->page . '/index.php');
    }

    function them(){
        $ds_loai_sach_cap_1 = $this->xl_loai_sach->load_danh_sach_loai_sach('', 0);
        foreach($ds_loai_sach_cap_1 as $key => $loai_sach_cap_1){
            $ds_loai_cha_cap_2 = $this->xl_loai_sach->load_danh_sach_loai_sach('', $loai_sach_cap_1->id);
            $ds_loai_sach_cap_1[$key]->ds_loai_sach_con = $ds_loai_cha_cap_2;
        }
        //echo '<pre>',print_r($ds_loai_sach_cap_1),'</pre>';

        if (isset($_POST['ten_loai_sach'])) {
            $ten_loai_sach = $_POST['ten_loai_sach'];
            $id_loai_cha = $_POST['id_loai_cha'];
            $sap_xep = $_POST['sap_xep'];
            $trang_thai = $_POST['trang_thai'];
        
            $result = $this->xl_loai_sach->them_loai_sach($ten_loai_sach, $id_loai_cha, $sap_xep, $trang_thai);
        } else {
        }

        include_once('view/ql_' . $this->page . '/them.php');
    }

    function sua(){
        $ds_loai_sach_cap_1 = $this->xl_loai_sach->load_danh_sach_loai_sach('', 0);
        foreach($ds_loai_sach_cap_1 as $key => $loai_sach_cap_1){
            $ds_loai_cha_cap_2 = $this->xl_loai_sach->load_danh_sach_loai_sach('', $loai_sach_cap_1->id);
            $ds_loai_sach_cap_1[$key]->ds_loai_sach_con = $ds_loai_cha_cap_2;
        }

        if (isset($_GET['id'])) {
            $loai_sach_can_sua = $this->xl_loai_sach->load_thong_tin_loai_sach($_GET['id']);
        
            if (isset($_POST['ten_loai_sach'])) {
                $ten_loai_sach = $_POST['ten_loai_sach'];
                $id_loai_cha = $_POST['id_loai_cha'];
                $sap_xep = $_POST['sap_xep'];
                $trang_thai = $_POST['trang_thai'];

                $result = $this->xl_loai_sach->sua_loai_sach($ten_loai_sach, $id_loai_cha, $sap_xep, $trang_thai, $_GET['id']);
            }
        }

        include_once('view/ql_' . $this->page . '/sua.php');
    }
}
?>