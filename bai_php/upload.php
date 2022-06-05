<?php
    echo '<pre>',print_r($_FILES),'</pre>';
    if(isset($_FILES['hinh'])){
        $mang_ten_file = explode('.',$_FILES['hinh']['name']);
        $duoi_file = $mang_ten_file[count($mang_ten_file) - 1];

        if($duoi_file == 'jpg' || $duoi_file == 'png' || $duoi_file == 'gif' || $duoi_file == 'webp' || $duoi_file == 'svg' || $duoi_file == 'jpeg' || $duoi_file == 'ico'){
            if($_FILES['hinh']['size'] < 5244880){
                try{
                    $time = microtime();
                    move_uploaded_file($_FILES['hinh']['tmp_name'], 'images/' . $mang_ten_file[0] . '-' . $time . '.' . $duoi_file);
                    echo 'Đã upload thành công';
                }
                catch(Exception $error){
                    echo 'Upload thất bại ' . $error;
                }
            }
            else{
                echo 'Đi nén dùm tôi, hình mà hơn 5MB ';
            }
        }
        else{
            echo 'File không hợp lệ ';
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
        
        <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <legend>Form title</legend>
                </div>
        

                <div class="form-group">
                    <div class="col-sm-2">
                        upload image:
                    </div>
                    <div class="col-sm-10">
                        <input type="file" name="hinh" />
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