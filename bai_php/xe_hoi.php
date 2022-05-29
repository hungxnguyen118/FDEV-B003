<?php
class xe_hoi {
    public $bien_so, $hieu_xe, $nam_san_xuat, $nha_san_xuat, $loai_nhien_lieu, $cong_suat_dong_co;

    
    function __construct($bien_so = '', $hieu_xe = '', $nam_san_xuat = '', $nha_san_xuat = '', $loai_nhien_lieu = '', $cong_suat_dong_co = ''){
        $this->bien_so = $bien_so;
        $this->hieu_xe = $hieu_xe;
        $this->nam_san_xuat = $nam_san_xuat;
        $this->nha_san_xuat = $nha_san_xuat;
        $this->loai_nhien_lieu = $loai_nhien_lieu;
        $this->cong_suat_dong_co = $cong_suat_dong_co;
    }

    public function luong_khi_thai(){
        return $this->cong_suat_dong_co * 10;
    }

    public function muc_tieu_thu_nang_luong(){
        return $this->cong_suat_dong_co / 3600;
    }

    public function so_tien_phai_tra_cho_nhien_lieu(){
        $tien = 0;
        //echo $this->loai_nhien_lieu . '-' . $this->cong_suat_dong_co;
        if($this->loai_nhien_lieu == 'xang'){
            $tien =  $this->cong_suat_dong_co * 31000;
        }
        else if($this->loai_nhien_lieu == 'dau'){
            $tien =  $this->cong_suat_dong_co * 17000;
        }
        else{
            $tien =  $this->cong_suat_dong_co * 2000;
        }
        return $tien;
    }
}

$xe_hoi_1 = new xe_hoi('59X-999.99', 'G63', '2022', 'Mescedes', 'xang', 500);

echo $xe_hoi_1->so_tien_phai_tra_cho_nhien_lieu() . ' VNĐ';

$xe_hoi_2 = new xe_hoi();
?>