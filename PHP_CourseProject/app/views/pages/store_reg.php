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
<?php if($_COOKIE['user_authorize']==''):?>
    <div class="alter-danger-borders alert alert-danger"><div class="text-alert">СПЕРШУ ПОТРІБНО АВТОРИЗУВАТИСЬ!!!!!!!!</div> </div> 
        <?php else: ?>
            <div class="container mt-4 topmargining">
    <div class="box1">
        <form action="../../controllers/check_store_reg.php" method="post" class="form_weight1">
            <h2>Форма регістрації</h2>
            <input name="store_name" id="login" type="text" class="form-control" placeholder="Назва магазину"><br>
            <input name="store_email" id="mail" type="text" class="form-control" placeholder="Email магазину"><br>
            <input name="store_adress" id="user_name" type="text" class="form-control" placeholder="Адресс магазину"><br>
            <input name="store_num" id="phnum" type="text" class="form-control" placeholder="Номер телефону"><br>
            <input name="store_erdpou" id="erdpou" type="text" class="form-control" placeholder="ЄРДПОУ"><br>
            <button type="submit" class="btn btn-outline-success">Зареєструвати себе як продавця
        </form>
    </div>
    </div>
        <?php endif; ?>
</div>
<?php include '../templates/footer.php'; ?>
</div>
</body>
</html>