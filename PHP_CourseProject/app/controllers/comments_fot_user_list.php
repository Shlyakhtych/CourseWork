<?php
$id_user = $_COOKIE['user_authorize'];
use app\model\goods\Goods_class;
require_once('../../models/goods.php');
$goods = new Goods_class;
$mass = $goods->user_comments($id_user);
$fetch = mysqli_fetch_assoc($mass);
$i = 1;
?>
<h2><div class="alert alert-warning" role="alert">
  Мої коментарі
</div></h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID коментаря</th>
      <th scope="col">Текст</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
     <?
     while($fetch!=false){
     ?>
     <tr>
          <th scope="row"><?=$i?></th>
          <td><?=$fetch['id_comment']?></td>
          <td><?=$fetch['comment']?></td>
          <td><button class="btn btn-outline-danger"><a class="danger_btn_color" href = "../../controllers/comment_delete.php?id=<?=$fetch['id_comment']?>">Видалити</a></button></td>
     </tr>
     <?
          $fetch = mysqli_fetch_assoc($mass);
          $i++;
     }
     ?>
    
   
  </tbody>
</table>

