<?php
if(isset($_POST['ten_file'])){
    $ten_file = $_POST['ten_file'];
    $ten_san_pham = $_POST['ten_san_pham'];
    $so_luong = $_POST['so_luong'];
    $don_gia = $_POST['don_gia'];

    $string_row = $ten_san_pham . '|' . $so_luong . '|' . $don_gia . PHP_EOL;

    $f = fopen('./data/' . $ten_file, 'a');
    fwrite($f, $string_row);
    fclose($f);
}
else{
    $ten_file = 'san_pham.txt';
}

echo filesize('./data/' . $ten_file);

//unlink('./data/file_can_xoa.txt');


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
                    <legend>Quản lý sản phẩm</legend>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-2">
                        Tên file
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="ten_file" id="inputten_file" class="form-control" value="" title="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Tên sản phẩm
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="ten_san_pham" id="inputten_ten_san_pham" class="form-control" value="" title="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Số lượng
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="so_luong" id="inputten_so_luong" class="form-control" value="" title="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Đơn giá
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="don_gia" id="inputten_don_gia" class="form-control" value="" title="">
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>


        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($ten_file){
                    if(file_exists('./data/' . $ten_file)){
                        $f = fopen('./data/' . $ten_file, 'r');
                        while(!feof($f)){
                            $row = fgets($f);
                            if($row){
                                $san_pham = explode('|', $row);
                                ?>
                                <tr>
                                    <td><?php echo $san_pham[0] ?></td>
                                    <td><?php echo $san_pham[1] ?></td>
                                    <td><?php echo $san_pham[2] ?></td>
                                    <td><?php echo $san_pham[1] * $san_pham[2] ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    else {
                        echo 'file không tồn tại';
                    }
                }
                ?>
            </tbody>
        </table>
        
        
    </div>
</body>
</html>