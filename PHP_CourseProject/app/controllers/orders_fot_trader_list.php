<?php
$id_user = $_COOKIE['user_authorize'];
use app\model\goods\Goods_class;
require_once('../../models/goods.php');
$goods = new Goods_class;
$mass = $goods->trader_orders($id_user);
$fetch = mysqli_fetch_assoc($mass);
$i = 1;
?>
<h2><div class="alert alert-warning" role="alert">
  Бажають замовити
</div></h2>
<table class="table table-striped">
  <thead>
    <tr>
     <th scope="col">#</th>
     <th scope="col">ID товару</th>
     <th scope="col">Кількість</th>
     <th scope="col">Ім'я</th>
     <th scope="col">Адресс</th>
     <th scope="col">Номер</th>
     <th scope="col">Емайл</th>
     <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
     <?
     while($fetch!=false){
          $user_nf = $goods -> user_by_id($fetch['id_user']);
          $user_fetch = mysqli_fetch_assoc($user_nf);
     ?>
     <tr>
          <th scope="row"><?=$i?></th>
          <td><?=$fetch['id_goods']?></td>
          <td><?=$fetch['count']?></td>
          <td><?=$user_fetch['name']?></td>
          <td><?=$user_fetch['adress']?></td>
          <td><?=$user_fetch['number']?></td>
          <td><?=$user_fetch['email']?></td>
          <td><button class="btn btn-outline-danger"><a class="danger_btn_color" href = "../../controllers/basket_delete.php?id=<?=$fetch['id_basket']?>">Видалити</a></button></td>
     </tr>
     <?
          $fetch = mysqli_fetch_assoc($mass);
          $i++;
     }
     ?>

  </tbody>
</table>