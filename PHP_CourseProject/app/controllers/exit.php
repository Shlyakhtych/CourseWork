<?php 
setcookie('user_authorize', $user['name'], time() - 3600 * 24, "/");
header('Location: /index.php?page=1')
?>