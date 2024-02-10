<?php
use app\model\check\Checks;
require_once('../models/ckecks.php');
$auth_check = new Checks;

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$user_cookie = $auth_check -> user_authorize($password, $email);
if($user_cookie === NULL)
          {
          header('Location: /app/views/pages/login_error.php');
          exit();
          }else{

          
setcookie('user_authorize', $user_cookie, time() + 3600 * 24, "/");
if($auth_check -> this_user_admin($user_cookie)===true){
     setcookie('user_authorize_status', 'admin', time() + 3600 * 24, "/");
} else{
if($auth_check -> this_user_trader($user_cookie)===true){
     setcookie('user_authorize_status', 'trader', time() + 3600 * 24, "/");
} else{
     setcookie('user_authorize_status', 'user', time() + 3600 * 24, "/");
}
}
}
header('Location: /index.php?page=1');
?>