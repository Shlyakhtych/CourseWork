<?php
$user_id = $_COOKIE['user_authorize'];
use app\model\goods\Goods_class;
require_once('../../models/goods.php');
$user_class = new Goods_class;
$user_msql = $user_class ->user_by_id($user_id);
$user = mysqli_fetch_assoc($user_msql);

?>
<div class="container form_weight1">
<div class="сol-container box3 form1">
    <div class=" box1 container grid-column"><div class="big-icon"><ion-icon name="person"></ion-icon></div><div class="acc_name"><?=$user['name']?></div></div>
    <div class="box1">
    <form action="../../controllers/account_update.php" method="post">
    <table>
      <tr>
        <td><textarea name="name" class="form-control account_input_maxsize mt-2" placeholder="Ім'я"><?=$user['name']?></textarea></td>
        <td><textarea name="login" class="form-control account_input_maxsize mt-2" placeholder="Логін"><?=$user['login']?></textarea></td>
      </tr>
      <tr>
        <td><textarea name="adress" class="form-control account_input_maxsize mt-2" placeholder="Адресс"><?=$user['adress']?></textarea></td>
        <td><textarea name="number" class="form-control account_input_maxsize mt-2" placeholder="Тел-номер"><?=$user['phone_number']?></textarea></td>
      </tr>
      <tr>
        <td><textarea name="email" class="form-control account_input_maxsize mt-2" placeholder="Email"><?=$user['email']?></textarea></td>
        <td><textarea name="password" class="form-control account_input_maxsize mt-2" placeholder="Новий пароль"></textarea></td>
      </tr>
    </table>
    </div>
<div class="box1 mt-4 btn-save-pos"><button type="submit"  class="btn btn-outline-warning marginning_index"><a class="warning text-decoration-off paddining_index succes_btn_color">Зберегти зміни</a></button></div>
</form>
</div>
<div class="box1 form2">
  <table>
    <tr>
      <td><div class="box1 mt-4"><button class=" size-fix btn btn-outline-info marginning_index"><a class="primary text-decoration-off paddining_index "  href="../pages/account.php?orders=1">Замовленя</a></button></div></td>
      <td><div class="box1 mt-4"><button class=" size-fix btn btn-outline-info marginning_index"><a class="primary text-decoration-off paddining_index "  href="../pages/account.php?comments=1">Kоментарі</a></button></div></td>
    </tr>
    <?if($_COOKIE['user_authorize_status']=='trader'){?>
    <tr>
      <td><div class="box1 mt-4"><button class=" size-fix btn btn-outline-info marginning_index"><a class="primary text-decoration-off paddining_index "  href="trader_page.php">Добавити товар</a></button></div></td>
      <td><div class="box1 mt-4"><button class=" size-fix btn btn-outline-info marginning_index"><a class="primary text-decoration-off paddining_index "  href="../pages/account.php?goods=1">Список товарів</a></button></div></td>
    </tr>
    <?} else if($_COOKIE['user_authorize_status']!='admin') {?>
      <td><div class=" ml-5 box1 mt-4"><button class=" size-fix btn btn-outline-info marginning_index"><a class="primary text-decoration-off paddining_index "  href="store_reg.php">Зареєструвати магазин</a></button></div></td>
    <?}?>
    <?if($_COOKIE['user_authorize_status']=='admin'){?>
    <tr>
      <td><div class="box1 mt-4"><button class=" size-fix btn btn-outline-info marginning_index"><a class="primary text-decoration-off paddining_index "  href="../pages/account.php?users=1">Користувачі</a></button></div></td>
      <td><div class="box1 mt-4"><button class=" size-fix btn btn-outline-info marginning_index"><a class="primary text-decoration-off paddining_index "  href="../pages/account.php?stores=1">Магазини</a></button></div></td>
    </tr>
    <?}?>
    <tr>
      <td>
      
      </Td>
    </tr>
  </table>

</div>
</div>

<div class="mt-4">
<?php
if($_GET['orders'] == 1){
  include 'orders_fot_user_list.php';
  echo 1;
}
if($_GET['orders'] == 1 && ($_COOKIE['user_authorize_status'] == 'trader' || $_COOKIE['user_authorize_status'] == 'admin') ){
  include 'orders_fot_trader_list.php';
}

if($_GET['comments'] == 1 && ($_COOKIE['user_authorize_status'] == 'user'  || $_COOKIE['user_authorize_status'] == 'admin')){
  include 'comments_fot_user_list.php';
}
if($_GET['comments'] == 1 && ($_COOKIE['user_authorize_status'] == 'trader')){
  include 'comments_fot_trader_list.php';
}
if($_GET['goods'] == 1 && ($_COOKIE['user_authorize_status'] == 'trader' || $_COOKIE['user_authorize_status'] == 'admin') ){
  include 'goods_list.php';
}
if($_GET['users'] == 1 && $_COOKIE['user_authorize_status'] == 'admin'){
  include 'users_list.php';
}
if($_GET['stores'] == 1 && $_COOKIE['user_authorize_status'] == 'admin'){
  include 'traders_list.php';
}?>

</div>
