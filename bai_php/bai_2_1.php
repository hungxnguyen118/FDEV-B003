<?php
if(isset($_POST['day_so'])){
    $string_day_so = $_POST['day_so'];
    $day_so = explode(',',$_POST['day_so']);

    $tong = 0;
    for($i = 0; $i < count($day_so); $i++){
        $tong += $day_so[$i];
    }
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
        <form action="" method="POST" class="form-horizontal" role="form">
            <div class="form-group">
                <legend>Tính tổng</legend>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    nhập dãy số
                </div>
                <div class="col-sm-10">
                    <input type="text" name="day_so" id="input" class="form-control" value="<?php echo isset($_POST['day_so'])?$_POST['day_so']:''; ?>" required="required" title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    Tổng kết quả
                </div>
                <div class="col-sm-10">
                    <input type="text" name="so_tien_phai_tra" id="input" class="form-control" value="<?php echo isset($tong)?$tong:''; ?>" readonly="true" title="">
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