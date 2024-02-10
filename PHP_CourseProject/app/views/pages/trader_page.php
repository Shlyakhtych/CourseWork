<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Trader Page</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link href="../../style_css/style.css" rel="stylesheet">
</head>
<body>
<div class="footer-fix">
<?php include '../templates/header.php'; ?>
<div class="header-skipped"></div>
<div class="main">

<form action="../../controllers/goods_scan.php" method="post" enctype="multipart/form-data">
     <div class="form6" >
<h2>Заповніть анкету товару:</h2>
<div class="alert alert-warning" role="alert">
(Усі поля окрім 2 та 3 зображення є обов'язковими!)
</div>
<table>
     <tr>
          <td>
          <label>Назва:</label><input name="name" type="text" class="form-control ">
          </td>
          <td>
          <label>Ціна:</label><input name="count" type="text" class="form-control ">
          </td>
          <td>
          <label>Розмір:</label><input name="size" type="text" class="form-control ">
          </td>
     </tr>
     <tr>
          <td>
          <label>Виготовлено:</label><input name="madeby" type="text" class="form-control ">
          </td>
          <td>
          <label>Тип:(Золото,Срібло)</label><input name="material" type="text" class="form-control ">
          </td>
          <td>
          <label>Вид:(Перстень,Браслет)</label><input name="type" type="text" class="form-control ">
          </td>
     </tr>
</table>
<label class="mt-4">Опис товару:</label>
<textarea name="discription" class="form-control com_txtar"></textarea>
     
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