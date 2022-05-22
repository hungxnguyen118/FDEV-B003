<?php
//echo '<pre>',print_r($_POST),'</pre>';
$thu = '';
if(isset($_POST['thang']) && isset($_POST['nam'])){
    $date = date_create($_POST['nam'] . '-' . $_POST['thang'] . '-01');
    //echo date_format($date, 'N');
    $number_day_in_week = date_format($date, 'N');
    $number_day_in_month = date_format($date, 't');
    echo $number_day_in_week . ' ' . $number_day_in_month;
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
                    tháng/năm
                </div>
                <div class="col-sm-10">
                    <input type="text" name="thang" id="input" class="form-control" value="<?php echo isset($_POST['thang'])?$_POST['thang']:''; ?>" required="required" title="">
                    <input type="text" name="nam" id="input" class="form-control" value="<?php echo isset($_POST['nam'])?$_POST['nam']:''; ?>" required="required" title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>


    
    
    
    <div class="container">
        <table class="table table-hover table-striped">
            <tr>
                <th>Thứ 2</th>
                <th>Thứ 3</th>
                <th>Thứ 4</th>
                <th>Thứ 5</th>
                <th>Thứ 6</th>
                <th>Thứ 7</th>
                <th>Chủ nhật</th>
            </tr>
            <?php
            $ngay_in = 1;
            $flag = 0;
            $flag_end = 0;
            for($i = 1; $i <= 42; $i++){

                if($i % 7 == 1){
                    ?>
                    <tr>
                    <?php
                }

                if($i == $number_day_in_week){
                    ?>
                    <td><?php echo $ngay_in ?></td>
                    <?php
                    $ngay_in++;
                    $flag = 1;
                }
                else if($flag && $ngay_in <= $number_day_in_month){

                    if($ngay_in == $number_day_in_month){
                        $flag_end = 1;
                    }
                    ?>
                    <td><?php echo $ngay_in ?></td>
                    <?php
                    $ngay_in++;
                }
                else{
                    if($ngay_in >= $number_day_in_month){
                        $flag_end = 1;
                    }
                    ?>
                    <td></td>
                    <?php
                }

                if($i % 7 == 0){
                    ?>
                    </tr>
                    <?php
                    if($flag_end){
                        break;
                    }
                }
            }
            ?>
        </table>
    </div>
</body>
</html>