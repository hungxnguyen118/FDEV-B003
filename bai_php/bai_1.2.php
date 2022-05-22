<?php
//echo '<pre>',print_r($_GET),'</pre>';
echo '<pre>',print_r($_POST),'</pre>';
// echo '<pre>',print_r($_REQUEST),'</pre>';

// echo '<pre>',print_r($_SERVER),'</pre>';

// $json = file_get_contents('php://input');
// echo $json;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bài tập 1.2</title>

    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
</head>
<body>
    
    <div class="container">
        <form action="" method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                    <legend>In Chữ</legend>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-2">
                        Nội dung
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="noi_dung" id="input" class="form-control" value="<?php echo isset($_POST['noi_dung'])?$_POST['noi_dung']:''; ?>" required="required" title="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Màu nền
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="mau_nen" id="input" class="form-control" value="<?php echo isset($_POST['mau_nen'])?$_POST['mau_nen']:''; ?>" required="required" title="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Màu chữ
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="mau_chu" id="input" class="form-control" value="<?php echo isset($_POST['mau_chu'])?$_POST['mau_chu']:''; ?>" required="required" title="">
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
        <div>
            <?php 
            if(isset($_POST['noi_dung'])){
                ?>
                <div style="background: #<?php echo $_POST['mau_nen'] ?>; color: #<?php echo $_POST['mau_chu'] ?>">
                    <?php echo $_POST['noi_dung'] ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    
    <?php
    
    ?>
</body>
</html>