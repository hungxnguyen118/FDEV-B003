<?php
$root_folder = 'du_lieu';

$dir = opendir($root_folder);

$folder_chose = '';
if(isset($_POST['folder'])){
    $folder_chose = $_POST['folder'];
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
    
    <style>
        .folder {
            position: relative;
        }

        .folder:before {
            content: "";
            position: absolute;
            left: -24px;
            width: 20px;
            height: 20px;
            background: url('./images/folder.webp') center center no-repeat;
            background-size: cover;
        }

        .file {
            position: relative;
        }

        .file:before {
            content: "";
            position: absolute;
            left: -24px;
            width: 20px;
            height: 20px;
            background: url('./images/file.png') center center no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <form action="" method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                    <legend>Danh sách thư mục</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        Chọn thư mục
                    </div>
                    <div class="col-sm-10">
                        
                        <select name="folder" id="input" class="form-control">
                            <?php
                            while(($file = readdir($dir)) !== false){
                                if(is_dir($root_folder . '/' . $file) && $file != '.' && $file != '..'){
                                    ?>
                                    <option value="<?php echo $file; ?>"><?php echo $file; ?></option>
                                    <?php
                                }
                            }
                            closedir($dir);
                            ?>
                        </select>
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
        
        <div class="content">
            <?php
            if($folder_chose){
                $dir_chose = opendir($root_folder . '/' . $folder_chose);
                while(($file = readdir($dir_chose)) !== false){
                    $dir_child = $root_folder . '/' . $folder_chose . '/' . $file;
                    //echo $dir_child;
                    if(is_dir($dir_child)){
                        if( $file != '.' && $file != '..'){
                            ?>
                            <div class="folder">
                                <?php echo $file; ?>
                            </div>
                            <?php
                        }
                        
                    }
                    else {
                        ?>
                        <div class="file">
                            <?php echo $file; ?>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
        
    </div>
</body>
</html>