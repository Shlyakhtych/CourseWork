<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../style_css/style.css" rel="stylesheet">
</head>
<body>
<div class="footer-fix">
<?php include '../templates/header.php'; ?>
<div class="header-skipped"></div>
<div class="main">
    <div class="container mt-4">
        <div class="box1">
        <form action="../../controllers/check_auth.php" method="post" class="form_weight1 margining_index">
            <h2>Форма авторизації</h2><br>
            <input name="email" id="mail" type="text" class="form-control" placeholder="Введіть свій email"><br>
            <input name="password" id="password" type="password" class="form-control" placeholder="Введіть пароль"><br>
            <div class = "alert alert-danger">Такого користувача не існує!</div>
            <button type="submit" class="btn btn-success">Авторизуватись
        </form>
        </div>
        <div class="box1">
            HERE WILL BE ADS )
        </div>
    </div>
    <span class="border"></span>
</div>
<?php include '../templates/footer.php'; ?>
</div>
</body>
</html>