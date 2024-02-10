<?php
$count = filter_var(trim($_POST['count']), FILTER_SANITIZE_STRING);
$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);

use app\model\goods\Goods_class;
require_once('../models/goods.php');
$goods = new Goods_class;
$goods->add_to_baket($id, $_COOKIE['user_authorize'], $count);
header('location:../views/pages/succesfull.php');