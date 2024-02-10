<?php
$id_user = $_COOKIE['user_authorize'];
use app\model\goods\Goods_class;
require_once('../../models/goods.php');
$goods = new Goods_class;
$mass = $goods->print_all_traders();
$fetch = mysqli_fetch_assoc($mass);
$i = 1;

?>
<h2><div class="alert alert-warning" role="alert">
  Коментарі до товарів
</div></h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID магазину</th>
      <th scope="col">ID продавця</th>
      <th scope="col">Назва</th>
      <th scope="col">Адресс</th>
      <th scope="col">Номер телефону</th>
      <th scope="col">Емайл</th>
      <th scope="col">ЄРДПОУ</th>
    </tr>
  </thead>
  <tbody>
     <?
     while($fetch!=false){
     ?>
     <tr>
          <th scope="row"><?=$i?></th>
          <td><?=$fetch['id_store']?></td>
          <td><?=$fetch['id_user']?></td>
          <td><?=$fetch['name']?></td>
          <td><?=$fetch['adress']?></td>
          <td><?=$fetch['phone_number']?></td>
          <td><?=$fetch['email']?></td>
          <td><?=$fetch['erdpou']?></td>
          <td><button class="btn btn-outline-danger"><a class="danger_btn_color" href = "../../controllers/trader_delete.php?id_s=<?=$fetch['id_store']?>&id_t=<?=$fetch['id_user']?>">Видалити</a></button></td>
     </tr>
     <?
          $fetch = mysqli_fetch_assoc($mass);
          $i++;
     }
     ?>
  </tbody>
</table>