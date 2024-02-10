<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Succesfull</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../style_css/style.css" rel="stylesheet">
</head>
<body>
<div class="footer-fix">
<?php include '../templates/header.php'; ?>
<div class="header-skipped"></div>
<div class="main">
    <ddiv class="container mt-4 topmargining">
        <div class="box1">
        <form class="form_weight1 margining_index">
            <h2><div class="alert alert-success" role="alert">
  Ви успішно зареєстрували магазин!
</div></h2><br>
<div class="alert alert-success" role="alert">
  Перезайдіть в акаунт, щоб права стали активними!
</div>
            <button class="btn btn-danger"><a href="../../controllers/exit.php">Вийти</a></button>
        </form>
        </div>
    </div>
    <span class="border"></span>
</div>
<?php include '../templates/footer.php'; ?>
</div>
</body>
</html>