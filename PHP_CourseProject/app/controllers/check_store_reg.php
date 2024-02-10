<?php
use app\model\check\Checks;
require_once('../models/ckecks.php');
$reg_check = new Checks;
$name = filter_var(trim($_POST['store_name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['store_email']), FILTER_SANITIZE_STRING);
$adress = filter_var(trim($_POST['store_adress']), FILTER_SANITIZE_STRING);
$number = filter_var(trim($_POST['store_num']), FILTER_SANITIZE_STRING);
$erdpou = filter_var(trim($_POST['store_erdpou']), FILTER_SANITIZE_STRING);
$id = $_COOKIE['user_authorize'];

if(mb_strlen($name)<0 || mb_strlen($name)>90) {
    echo "Не коректна довжина назви магазину!";
    exit();
}
if(mb_strlen($email)<5 || mb_strlen($email)>90) {
    echo "Не коректна довжина эмайлу!";
    exit();
}
if(mb_strlen($adress)<4 || mb_strlen($adress)>49) {
    echo "Не коректна довжина імені!";
    exit();
}
if(mb_strlen($number)<8 || mb_strlen($number)>32 ) {
    echo "Не коректна введений номер!";
    exit();
}
if(mb_strlen($erdpou)!=8) {
    echo "Не коректна введений ЄРДПОУ!";
    exit();
}

$reg_check->store_registration($name, $email, $adress, $number, $erdpou, $id);
header('Location: /index.php?page=1')
?>