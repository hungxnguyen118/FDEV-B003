<?php
session_start();

$string_user = file_get_contents('data/user.json');
$mang_user = json_decode($string_user);
//echo '<pre>',print_r($_SESSION),'</pre>';

if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
    header('location: xin_chao.php');
}

//echo '<pre>',print_r($_POST),'</pre>';
if(isset($_POST['uname']) && isset($_POST['psw'])){
    $flag = 0;
    foreach($mang_user as $user){

        if($user->uname == $_POST['uname'] && $user->psw == $_POST['psw']){
            $flag = 1;
            if($_POST['remember']){
                setcookie('user', json_encode($user), time() + 7 * 84600);
            }
            else{
                $_SESSION['user'] = $user;
            }

            header('location: xin_chao.php');
        }
        
    }

    if($flag == 0){
        echo 'đăng nhập thất bại. Username hoặc password không đúng';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1; width: 600px; margin: auto;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login Form</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>