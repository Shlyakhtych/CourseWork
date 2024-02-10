<?php
use app\model\goods\Goods_class;
require_once('../models/goods.php');
$comment_word = new Goods_class;

$rating = filter_var(trim($_POST['rating']), FILTER_SANITIZE_STRING);

$content = filter_var(trim($_POST['comment_text']), FILTER_SANITIZE_STRING);
$id_goods = filter_var(trim($_POST['gdid']), FILTER_SANITIZE_STRING);
$id_user = $_COOKIE['user_authorize'];
$mass = $comment_word -> user_by_id($id_user);
$mass_fetch = mysqli_fetch_assoc($mass);
$user_name = $mass_fetch['name'];

if ($rating > 10 || $rating < 0) {
     header("location: ../views/pages/generation.php?id=".$id_goods."&error=1");
     exit();
}
if ($id_user == NULL) {
     header("location: ../views/pages/generation.php?id=".$id_goods."&error=2");
     exit();
}
$comment_word -> set_comment($rating, $content, $id_user, $id_goods, $user_name);
header("location: ../views/pages/generation.php?id=".$id_goods);

