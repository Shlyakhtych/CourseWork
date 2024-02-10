<?php
$id = $_COOKIE['user_authorize'];
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$adress = filter_var(trim($_POST['adress']), FILTER_SANITIZE_STRING);
$number = filter_var(trim($_POST['number']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

use app\model\check\Checks;
require_once('../models/ckecks.php');
$update_check = new Checks;
if(empty($password)===false){
$update_check ->password_update($id, $password);
}
$update_check -> account_update($id, $name, $email, $adress, $number, $login);
header('location:../views/pages/account.php');