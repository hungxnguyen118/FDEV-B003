<?php
$mang_hang_xe = ['Ferrari', 'Bugati', 'Porche', 'RollRoyce', 'BMW', 'Audi', 'Lamborgini', 'Mustang'];
$mang_xe_theo_hang = [];

class xe {
    public $ten_xe, $hang_xe, $mo_ta, $hinh;

    function __construct($ten_xe = '', $hang_xe = '', $mo_ta = '', $hinh = ''){
        $this->ten_xe = $ten_xe;
        $this->hang_xe = $hang_xe;
        $this->mo_ta = $mo_ta;
        $this->hinh = $hinh;
    }

    function khoi_tao_tu_mang($mang){
        $this->ten_xe = $mang[0];
        $this->hang_xe = $mang[1];
        $this->mo_ta = $mang[2];
        $this->hinh = $mang[3];
    }

    function in_thong_tin_xe_luu() {
        return $this->ten_xe . '|' . $this->hang_xe . '|' . $this->mo_ta . '|' . $this->hinh . PHP_EOL;
    }

    function luu_xe(){
        $f = fopen('data/xe.txt', 'a');
        fwrite($f, $this->in_thong_tin_xe_luu());
        fclose($f);
    }
}


function upload_image($file_hinh){
    $mang_ten_file = explode('.',$file_hinh['name']);
    $duoi_file = $mang_ten_file[count($mang_ten_file) - 1];
    $ten_hinh = '';

    if($duoi_file == 'jpg' || $duoi_file == 'png' || $duoi_file == 'gif' || $duoi_file == 'webp' || $duoi_file == 'svg' || $duoi_file == 'jpeg' || $duoi_file == 'ico'){
        if($file_hinh['size'] < 5244880){
            try{
                $time = time();
                $ten_hinh = $mang_ten_file[0] . '-' . $time . '.' . $duoi_file;
                move_uploaded_file($file_hinh['tmp_name'], 'images/' . $ten_hinh);
                //echo 'Đã upload thành công';
            }
            catch(Exception $error){
                //echo 'Upload thất bại ' . $error;
            }
        }
        else{
            //echo 'Đi nén dùm tôi, hình mà hơn 5MB ';
        }
    }
    else{
        //echo 'File không hợp lệ ';
    }

    return $ten_hinh;
}

function sap_xep_xe_theo_hang($mang_hang_xe, $mang_xe){
    $mang_xe_theo_hang = [];
    foreach($mang_hang_xe as $hang_xe){
        foreach($mang_xe as $xe){
            if($xe){
                if($xe->hang_xe == $hang_xe){
                    $mang_xe_theo_hang[$hang_xe][] = $xe;
                }
            }
        }
    }
    return $mang_xe_theo_hang;
}

if(isset($_POST['ten_xe'])){
    $ten_hinh_xe = '';
    if(isset($_FILES['hinh_xe'])){
        //echo '<pre>',print_r($_FILES),'</pre>';
        $ten_hinh_xe = upload_image($_FILES['hinh_xe']);
    }

    $xe_moi = new xe($_POST['ten_xe'], $_POST['hang_xe'], $_POST['mo_ta'], $ten_hinh_xe);
    $xe_moi->luu_xe();
}

$string_ds_xe = file_get_contents('data/xe.txt');
$mang_ds_xe = explode(PHP_EOL, $string_ds_xe);
unset($mang_ds_xe[count($mang_ds_xe) - 1]);
foreach($mang_ds_xe as $key => $xe){
    if($xe){
        $xe = explode('|', $xe);
        $xe_obj = new xe();
        $xe_obj->khoi_tao_tu_mang($xe);
        $mang_ds_xe[$key] = $xe_obj;
    }
}

//echo '<pre>',print_r($mang_ds_xe),'</pre>';
$mang_xe_theo_hang = sap_xep_xe_theo_hang($mang_hang_xe, $mang_ds_xe);
//echo '<pre>',print_r($mang_xe_theo_hang),'</pre>';
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

    <style>
        .main_content {
            display: flex;
        }

        .div_chua_thong_tin_detail_xe {
            display: flex;
        }

        .thong_tin_hinh {
            margin: 10px;
        }

        .thong_tin_hinh img {
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <legend>Form title</legend>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-2">
                        Tên xe
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="ten_xe" id="inputten_xe" class="form-control" value="" title="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Hãng xe
                    </div>
                    <div class="col-sm-10">
                        <select name="hang_xe" id="">
                            <?php
                            foreach($mang_hang_xe as $hang_xe){
                                ?>
                                <option value="<?= $hang_xe ?>"><?= $hang_xe ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Mô tả:
                    </div>
                    <div class="col-sm-10">
                        <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control" style="resize: none;"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Hình xe:
                    </div>
                    <div class="col-sm-10">
                        <input type="file" name="hinh_xe" class="form-control" value="" title="">
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
        
        <div class="main_content">
            <div class="danh_sach_hang_xe">
                <?php
                foreach($mang_hang_xe as $hang_xe){
                    ?>
                    <div>
                        <a href="?hang_xe=<?php echo $hang_xe ?>"><?php echo $hang_xe ?></a>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="thong_tin_xe">
                <?php
                $hang_xe_chon = $mang_hang_xe[0];
                if(isset($_GET['hang_xe'])){
                    $hang_xe_chon = $_GET['hang_xe'];
                }

                $flag = 0;
                foreach($mang_xe_theo_hang as $key => $ds_xe){
                    if($hang_xe_chon == $key){
                        $flag = 1;
                    }
                }
                
                if($flag == 1){
                    foreach($mang_xe_theo_hang[$hang_xe_chon] as $xe_theo_hang){
                        ?>
                        <div class="div_chua_thong_tin_detail_xe">
                            <div class="thong_tin_hinh">
                                <img src="images/<?php echo $xe_theo_hang->hinh; ?>" alt="">
                            </div>
                            <div class="thong_tin_xe_detail">
                                <div>
                                    tên xe: <?php echo $xe_theo_hang->ten_xe; ?>
                                </div>
                                <div>
                                    mô tả: <?php echo $xe_theo_hang->mo_ta; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                else{
                    ?>
                    <div class="div_chua_thong_tin_detail_xe">
                        Chưa có xe nào
                    </div>
                    <?php
                }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>