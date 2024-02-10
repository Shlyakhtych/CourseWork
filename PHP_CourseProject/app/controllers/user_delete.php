<?php
$id = $_GET['id'];
use app\model\goods\Goods_class;
require_once('../models/goods.php');
$goods = new Goods_class;
$goods->user_delete($id);
header('location:../views/pages/account.php');