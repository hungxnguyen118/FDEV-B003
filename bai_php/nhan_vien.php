<?php
class nhan_vien {
    public $ho_ten, $gioi_tinh, $ngay_sinh, $ngay_vao_lam, $so_con, $he_so_luong, $luong_cb;

    function __construct($ho_ten, $gioi_tinh, $ngay_sinh, $ngay_vao_lam, $so_con, $he_so_luong, $luong_cb = 4500000){
        $this->ho_ten = $ho_ten;
        $this->gioi_tinh = $gioi_tinh;
        $this->ngay_sinh = $ngay_sinh;
        $this->ngay_vao_lam = $ngay_vao_lam;
        $this->he_so_luong = $he_so_luong;
        $this->luong_cb = $luong_cb;
        $this->so_con = $so_con;
    }

    function tro_cap(){
        return $this->so_con * 200000;
    }

    function tien_thuong(){
        return (date('Y') - date('Y', $this->ngay_vao_lam)) * 500000;
    }

    function tien_luong(){
        return ($this->luong_cb * $this->he_so_luong) + $this->tro_cap() + $this->tien_thuong();
    }
}

class nv_vp extends nhan_vien {
    public $so_ngay_vang; 
    public $dm_vang = 2;
    public $don_gia_phat = 50000;

    function __construct($ho_ten, $gioi_tinh, $ngay_sinh, $ngay_vao_lam, $so_con, $he_so_luong, $luong_cb, $so_ngay_vang){
        parent::__construct($ho_ten, $gioi_tinh, $ngay_sinh, $ngay_vao_lam, $so_con, $he_so_luong, $luong_cb);
        $this->so_ngay_vang = $so_ngay_vang;
    }

    function tien_phat() {
        $tien_phat = 0;
        if($this->so_ngay_vang > $this->dm_vang){
            $tien_phat = ($this->so_ngay_vang - $this->dm_vang) * $this->don_gia_phat;
        }
        return $tien_phat;
    }

    function tien_luong(){
        return parent::tien_luong() - $this->tien_phat();
    }
}

class nv_sx extends nhan_vien {
    public $so_san_pham;
    public $dm_san_pham = 1000;
    public $don_gia_san_pham = 12000;

    function __construct($ho_ten, $gioi_tinh, $ngay_sinh, $ngay_vao_lam, $so_con, $he_so_luong, $luong_cb, $so_san_pham){
        parent::__construct($ho_ten, $gioi_tinh, $ngay_sinh, $ngay_vao_lam, $so_con, $he_so_luong, $luong_cb);
        $this->so_san_pham = $so_san_pham;
    }

    function tien_thuong(){
        $tien_thuong = 0;
        if($this->so_san_pham > $this->dm_san_pham){
            $tien_thuong = ($this->so_san_pham - $this->dm_san_pham) * $this->don_gia_san_pham * 0.05;
        }
        return $tien_thuong;
    }

    function tien_luong(){
        return ($this->so_san_pham * $this->don_gia_san_pham) + $this->tien_thuong();
    }
}

// $nhan_vien_vp_1 = new nv_vp('Hùng', 'Nam', '11/08', mktime(0, 0, 0, 7, 1, 2021), 1, 2.7, 4500000, 1);
// echo $nhan_vien_vp_1->tien_luong() . '<br/>';

// $nhan_vien_sx_1 = new nv_sx('Hùng 2', 'Nam', '11/08', mktime(0, 0, 0, 7, 1, 2010), 1, 10.8, 4500000, 1500);
// echo $nhan_vien_sx_1->tien_luong();
$nhan_vien;

if(isset($_POST['ho_ten'])){
    $ngay_vao_lam_mang = explode('-',$_POST['ngay_vao_lam']);

    if($_POST['loai_nhan_vien'] == 'van_phong'){
        $nhan_vien = new nv_vp($_POST['ho_ten'], $_POST['gioi_tinh'], $_POST['ngay_sinh'], mktime(0, 0, 0, $ngay_vao_lam_mang[1], $ngay_vao_lam_mang[2], $ngay_vao_lam_mang[0]), $_POST['so_con'], $_POST['he_so_luong'], 4500000, $_POST['so_ngay_vang']);
    }
    else{
        $nhan_vien = new nv_sx($_POST['ho_ten'], $_POST['gioi_tinh'], $_POST['ngay_sinh'], mktime(0, 0, 0, $ngay_vao_lam_mang[1], $ngay_vao_lam_mang[2], $ngay_vao_lam_mang[0]), $_POST['so_con'], $_POST['he_so_luong'], 4500000, $_POST['so_san_pham']);
    }

    echo $nhan_vien->tien_luong();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
        
        <form action="" method="POST">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="4">Quản lý nhân viên</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Họ và tên:
                        </td>
                        <td>
                            <input type="text" name="ho_ten" id="input" class="form-control" value="" title="">
                        </td>
                        <td>
                            Số con:
                        </td>
                        <td>
                            <input type="text" name="so_con" id="input" class="form-control" value="" title="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngày sinh:
                        </td>
                        <td>
                            <input type="date" name="ngay_sinh" id="input" class="form-control" value="" title="">
                        </td>
                        <td>
                            Ngày vào làm:
                        </td>
                        <td>
                            <input type="date" name="ngay_vao_lam" id="input" class="form-control" value="" title="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Giới tính:
                        </td>
                        <td>
                            <label for="nam">
                                Nam
                            </label>
                            <input type="radio" name="gioi_tinh" id="nam" value="nam" title="">
                            <label for="nu">
                                Nữ
                            </label>
                            <input type="radio" name="gioi_tinh" id="nu" value="nu" title="">
                        </td>
                        <td>
                            Hệ số lương:
                        </td>
                        <td>
                            <input type="text" name="he_so_luong" id="input" class="form-control" value="" title="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Loại nhân viên:
                        </td>
                        <td>
                            <label for="van_phong">
                                Văn Phòng
                            </label>
                            <input type="radio" name="loai_nhan_vien" id="van_phong" value="van_phong" title="">
                            
                        </td>
                        <td>
                            <label for="san_xuat">
                                Sản xuất
                            </label>
                            <input type="radio" name="loai_nhan_vien" id="san_xuat" value="san_xuat" title="">
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            Số ngày vắng:
                            <input type="text" name="so_ngay_vang" id="input" value="" title="">
                        </td>
                        <td>
                            Số sản phẩm:
                            <input type="text" name="so_san_pham" id="input" value="" title="">
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiền thưởng:
                        </td>
                        <td>
                            <input type="text" name="tien_thuong" id="input" value="<?php echo $nhan_vien->tien_thuong(); ?>" title="">
                        </td>
                        <td>
                            Tiền trợ cấp:
                        </td>
                        <td>
                            <input type="text" name="tien_tro_cap" id="input" value="<?php echo $nhan_vien->tro_cap(); ?>" title="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right">
                            Tiền lương:
                        </td>
                        <td colspan="2">
                            <input type="text" name="tien_luong" id="input" value="<?php echo $nhan_vien->tien_luong(); ?>" title="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:center">
                            <button type="submit" class="btn btn-primary">Tính tiền</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        
    </div>
</body>
</html>