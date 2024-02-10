<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../style_css/style.css" rel="stylesheet">
</head>
<body>
<div class="footer-fix">
<?php include '../templates/header.php'; ?>
<div class="header-skipped"></div>
<div class="main">
    <div class="container mt-4 topmargining">
    <div class="box1">
        <form action="../../controllers/check_reg.php" method="post" class="form_weight1">
            <h2>Форма регістрації</h2>
            <input name="login" id="login" type="text" class="form-control" placeholder="Введіть логін"><br>
            <input name="email" id="mail" type="text" class="form-control" placeholder="Введіть свій email"><br>
            <input name="user_name" id="user_name" type="text" class="form-control" placeholder="Введіть імя та фамілію"><br>
            <input name="password" id="password" type="text" class="form-control" placeholder="Придумайте пароль"><br>
            <button type="submit" class="btn btn-success">Зареєструватись
        </form>
    </div>
        <div class="box1">
            HERE WILL BE ADS )
        </div>
    </div>
</div>
<?php include '../templates/footer.php'; ?>
</div>
</body>
</html>