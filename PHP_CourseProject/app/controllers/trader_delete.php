<?php
$id_s = $_GET['id_s'];
$id_t = $_GET['id_t'];
use app\model\goods\Goods_class;
require_once('../models/goods.php');
$goods = new Goods_class;
$goods->store_delete($id_s);
$goods->trader_delete($id_t);
header('location:../views/pages/account.php');