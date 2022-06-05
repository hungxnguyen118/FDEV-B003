<?php
session_start();

if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
    if(isset($_COOKIE['user'])){
        $user_string = $_COOKIE['user'];
        $user = json_decode($user_string);
        echo 'xin chào bạn ' . $user->name;
    }
    else{
        echo 'xin chào bạn ' . $_SESSION['user']->name;
    }
}
else{
    header('location: bai_giang_session_cookie.php');
}

if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    setcookie('user','',time());
    header('location: bai_giang_session_cookie.php');
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
    
    <a href="?logout=true">
        <button type="button" class="btn btn-danger">Logout</button>
    </a>
    
</body>
</html>