<?php
//echo '<pre>',print_r($_POST),'</pre>';
$thu = '';
if(isset($_POST['ngay']) && isset($_POST['thang']) && isset($_POST['nam'])){
    $date = date_create($_POST['nam'] . '-' . $_POST['thang'] . '-' . $_POST['ngay']);
    //echo date_format($date, 'N');
    $number_day_in_week = date_format($date, 'N');

    switch($number_day_in_week){
        case 1:
            $thu = "Thứ hai";
            break;
        case 2:
            $thu = "Thứ ba";
            break;
        case 3:
            $thu = "Thứ tư";
            break;
        case 4:
            $thu = "Thứ năm";
            break;
        case 5:
            $thu = "Thứ sáu";
            break;
        case 6:
            $thu = "Thứ bảy";
            break;
        case 7:
            $thu = "Chủ nhật";
            break;
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
                <legend>Tìm thứ trong tuần</legend>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    Ngày/tháng/năm
                </div>
                <div class="col-sm-10">
                    <input type="text" name="ngay" id="input" class="form-control" value="<?php echo isset($_POST['ngay'])?$_POST['ngay']:''; ?>" required="required" title="">
                    <input type="text" name="thang" id="input" class="form-control" value="<?php echo isset($_POST['thang'])?$_POST['thang']:''; ?>" required="required" title="">
                    <input type="text" name="nam" id="input" class="form-control" value="<?php echo isset($_POST['nam'])?$_POST['nam']:''; ?>" required="required" title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <?php echo $thu; ?>
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