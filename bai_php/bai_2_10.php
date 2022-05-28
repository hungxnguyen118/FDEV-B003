<?php
$string_mang_duy_nhat = '';
$string_mang_dem = '';

function print_mang_dem($mang){
    $string = '';
    $dem = 0;
    if(count($mang) > 0){
        foreach($mang as $key => $value){
            if($dem == 0){
                $string .= $key . ' => ' . $value;
            }
            else{
                $string .= ' ; ' . $key . ' => ' . $value;
            }
            $dem++;
        }
    }
    return $string;
}

if(isset($_POST['day_so'])){
    $string_day_so = $_POST['day_so'];
    $day_so = explode(',',$_POST['day_so']);

    //echo '<pre>',print_r($day_so),'</pre>';
    $mang_duy_nhat = [];
    $mang_dem = [];
    

    for($i = 0; $i < count($day_so); $i++){
        $flag = 0;
        for($j = 0; $j < count($mang_duy_nhat); $j++){
            if($mang_duy_nhat[$j] == $day_so[$i]){
                $flag = 1;
                break;
            }
        }

        if($flag == 0){
            $mang_duy_nhat[] = $day_so[$i];
            $mang_dem[$day_so[$i]] = 1; 
        }
        else if($flag == 1) {
            $mang_dem[$day_so[$i]] += 1;
        }
    }

    //echo '<pre>',print_r($mang_duy_nhat),'</pre>';
    //echo '<pre>',print_r($mang_dem),'</pre>';

    $string_mang_duy_nhat = implode(',', $mang_duy_nhat);
    $string_mang_dem = print_mang_dem($mang_dem);
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
                <legend>Tìm mảng duy nhất và đếm số lần xuất hiện</legend>
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
                    mảng duy nhất
                </div>
                <div class="col-sm-10">
                    <input type="text" name="mang_duy_nhat" id="input" class="form-control" value="<?php echo $string_mang_duy_nhat; ?>" title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    mảng đếm
                </div>
                <div class="col-sm-10">
                    <input type="text" name="mang_duy_nhat" id="input" class="form-control" value="<?php echo $string_mang_dem; ?>" title="">
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