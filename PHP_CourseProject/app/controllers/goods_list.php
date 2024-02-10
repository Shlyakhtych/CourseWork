<?php
$id_user = $_COOKIE['user_authorize'];
use app\model\goods\Goods_class;
require_once('../../models/goods.php');
$goods = new Goods_class;
$mass = $goods->trader_goods_list($id_user);
$fetch = mysqli_fetch_assoc($mass);
$i = 1;
?>
<h2><div class="alert alert-warning" role="alert">
  Моя продукція
</div></h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID товару</th>
      <th scope="col">Ціна</th>
      <th scope="col">Тип</th>
      <th scope="col">Матеріа</th>
      <th scope="col">Опис</th>
      <th scope="col"></th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
     <?
     while($fetch!=false){
     ?>
     <tr>
          <th scope="row"><?=$i?></th>
          <td><?=$fetch['id_goods']?></td>
          <td><?=$fetch['cost']?></td>
          <td><?=$fetch['type']?></td>
          <td><?=$fetch['material']?></td>
          <td><?=$fetch['description']?></td>
          <td><button class="btn btn-outline-danger"><a class="danger_btn_color" href = "../../controllers/goods_delete.php?id=<?=$fetch['id_goods']?>">Видалити</a></button></td>
          <td><button class="btn btn-outline-warning"><a class="warning" href = "goods_edit.php?id=<?=$fetch['id_goods']?>">Редагувати</a></button></td>
     </tr>
     <?
          $fetch = mysqli_fetch_assoc($mass);
          $i++;
     }
     ?>
    
   
  </tbody>
</table>
