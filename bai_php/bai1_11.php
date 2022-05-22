<?php
$now = new DateTime();
$now->setTimezone(new DateTimeZone('America/Adak'));
echo $now->format('H');
$so_gio_hat = isset($_POST['so_gio_hat'])?$_POST['so_gio_hat']:"";

if($so_gio_hat){
    $gio_bat_dau = $now->format('H') - $so_gio_hat;
    $gio_ket_thuc = $now->format('H');

    if($gio_bat_dau >= 10 && $gio_bat_dau < $gio_ket_thuc && $gio_ket_thuc <= 24){
        if($gio_bat_dau >= 10 && $gio_ket_thuc <= 17){
            $so_tien = $so_gio_hat * 20000;
        }
        else if($gio_bat_dau >= 17 && $gio_ket_thuc <= 24){
            $so_tien = $so_gio_hat * 45000;
        }
        else {
            $so_gio_khung_1 = 17 - $gio_bat_dau;
            $so_gio_khung_2 = $gio_ket_thuc - 17;
    
            $so_tien = $so_gio_khung_1 * 20000 + $so_gio_khung_2 * 45000;
        }
    }
    else{
        $so_tien = "Đi hát giờ không tồn tại, sao hay vậy?";
    }
}
//echo $now->format('H');
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
        <form action="" method="POST" class="form-horizontal" role="form">
            <div class="form-group">
                <legend>Tính tiền Karaoke</legend>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    Số giờ hát
                </div>
                <div class="col-sm-10">
                    <input type="text" name="so_gio_hat" id="input" class="form-control" value="<?php echo isset($_POST['so_gio_hat'])?$_POST['so_gio_hat']:''; ?>" required="required" title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    Số tiền phải trả
                </div>
                <div class="col-sm-10">
                    <input type="text" name="so_tien_phai_tra" id="input" class="form-control" value="<?php echo isset($so_tien)?$so_tien:''; ?>" readonly="true" title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>