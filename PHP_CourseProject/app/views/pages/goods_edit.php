<?
$id_product = $_GET['id'];
use app\model\goods\Goods_class;
require_once('../../models/goods.php');
$goods = new Goods_class;
$result = $goods->goods_serch_by_id($id_product);
$fetch = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Goods Edit</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link href="../../style_css/style.css" rel="stylesheet">
</head>
<body>
<div class="footer-fix">
<?php include '../templates/header.php'; ?>
<div class="header-skipped"></div>
<div class="main">

<form action="../../controllers/goods_update.php" method="post" enctype="multipart/form-data">
     <div class="form6" >
<h2>Змініть поля які вас турбують:</h2>
<div class="alert alert-warning" role="alert">
(Усі поля окрім 2 та 3 зображення є обов'язковими!)
</div>
<table>
     <tr>
          <td>
          <label>Назва:</label><textarea name="name" type="text" class="account_input_maxsize form-control "><?=$fetch['name']?></textarea>
          </td>
          <td>
          <label>Ціна:</label><textarea name="count" type="text" class="account_input_maxsize form-control "><?=$fetch['cost']?></textarea>
          </td>
          <td>
          <label>Розмір:</label><textarea name="size" type="text" class="account_input_maxsize form-control "><?=$fetch['size']?></textarea>
          </td>
     </tr>
     <tr>
          <td>
          <label>Виготовлено:</label><textarea name="madeby" type="text" class="account_input_maxsize form-control "><?=$fetch['made_by']?></textarea>
          </td>
          <td>
          <label>Тип:(Золото,Срібло)</label><textarea name="material" type="text" class="account_input_maxsize form-control "><?=$fetch['material']?></textarea>
          </td>
          <td>
          <label>Вид:(Перстень,Браслет)</label><textarea name="type" type="text" class="account_input_maxsize form-control "><?=$fetch['type']?></textarea>
          </td>
     </tr>
</table>
<label class="mt-4">Опис товару:</label>
<textarea name="discription" class="form-control com_txtar"><?=$fetch['description']?></textarea>
<textarea name="id" type="text" class="opacity0"><?=$_GET['id']?></textarea>
     
<div class="container mt-4">
     <div class="box1">
     <label>Img 1:</label>
     <input name="img1" type="file">
     </div>
     <div class="box1">
     <label>Img 2:</label>
     <input name="img2" type="file">
     </div>
     <div class="box1">
     <label>Img 3:</label>
     <input name="img3" type="file">
     </div>
</div>
<button type="submit" class="btn btn-outline-success mt-4">Опублікувати</button>
</div>

</form>
</div>
<?php include '../templates/footer.php'; ?>
</div>
</body>
</html> 