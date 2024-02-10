<?php
use app\model\goods\Goods_class;
use function PHPSTORM_META\type;
require_once('../models/goods.php');
$data_goods = new Goods_class;

$id_use = $_COOKIE['user_authorize'];
$stores = $data_goods -> store_by_user_id($id_use);
$str_fetchm = mysqli_fetch_assoc($stores);
$id_store = $str_fetchm['id_store'];

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$count = filter_var(trim($_POST['count']), FILTER_SANITIZE_STRING);
$size = filter_var(trim($_POST['size']), FILTER_SANITIZE_STRING);
$madeby = filter_var(trim($_POST['madeby']), FILTER_SANITIZE_STRING);
$material = filter_var(trim($_POST['material']), FILTER_SANITIZE_STRING);
$type = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
$discription = filter_var(trim($_POST['discription']), FILTER_SANITIZE_STRING);
$id_goods = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);

$img1 = $_FILES['img1']['size'];
$img2 = $_FILES['img2']['size'];
$img3 = $_FILES['img3']['size'];

if($img1 != 0){
     $img1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
     $data_goods -> img_upload($img1, $id_goods, 1);
} 
if($img2 != 0){
     $img2 = addslashes(file_get_contents($_FILES['img2']['tmp_name']));
     $data_goods -> img_upload($img2, $id_goods, 2);
} 
if($img3 != 0){
     $img3 = addslashes(file_get_contents($_FILES['img3']['tmp_name']));
     $data_goods -> img_upload($img3, $id_goods, 3);
} 


$data_goods -> update_data($name, $count, $size, $madeby, $material, $type, $discription, $id_store, $id_goods);

//header('location:../views/pages/account.php');