<?php
use app\model\check\Checks;
require_once('../models/ckecks.php');
$reg_check = new Checks;

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$user_name = filter_var(trim($_POST['user_name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

if(mb_strlen($login)<0 || mb_strlen($login)>90) {
    echo "Не коректна довжина логіна!";
    exit();
}
if(mb_strlen($email)<5 || mb_strlen($email)>90) {
    echo "Не коректна довжина логіна!";
    exit();
}
if(mb_strlen($user_name)<4 || mb_strlen($user_name)>49) {
    echo "Не коректна довжина імені!";
    exit();
}
if(mb_strlen($password)<8 || mb_strlen($password)>32 ) {
    echo "Не коректна введений пароль!";
    exit();
}
$reg_check->user_registration($login, $email, $user_name, $password);
header('Location: /index.php?page=1')
?>