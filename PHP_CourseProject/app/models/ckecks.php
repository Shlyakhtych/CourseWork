<?php
namespace app\model\check;
use mysqli;
class Checks{

     public function user_authorize($pass, $email){
          
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT*FROM `users` WHERE `email` = '$email' AND `password` = '$pass'");
          $user = $result->fetch_assoc();
          $mysql->close();
          return $user['id_user'];
          
     }
     public function user_registration($login, $email, $name, $pass){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query(
          "INSERT INTO `users`(`login`,`email`, `password`, `name`, `trader`)
          VALUES('$login','$email', '$pass', '$name', '0')");
          $mysql->close();
     }
     
     public function this_user_trader($id)
     {
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT*FROM `users` WHERE `id_user` = '$id'");
          $result_fetch = $result->fetch_assoc();
          if($result_fetch['trader']==1){
               return true;
          }
          else{
               return false;
          }
          $mysql->close();
     
     }
     public function this_user_admin($id)
     {
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT*FROM `users` WHERE `id_user` = '$id'");
          $result_fetch = $result->fetch_assoc();
          if($result_fetch['admin']==1){
               return true;
          }
          else{
               return false;
          }
          $mysql->close();
     }

     public function store_registration($name, $email, $adress, $number, $erdpou, $id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("INSERT INTO `stores`(`name`,`email`, `adress`, `phone_number`, `erdpou`, `id_user`)VALUES('$name','$email', '$adress', '$number', '$erdpou', '$id')");
          $mysql->query("UPDATE`users` SET `trader` = '1' WHERE id_user like '$id'");
          $mysql->close();
          
     }
     public function account_update($id ,$name, $email, $adress, $number, $login) {
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("UPDATE `users`  SET `name` = '$name', `email` = '$email', `adress` = '$adress', `phone_number` = '$number', `login` = '$login'  WHERE `id_user` = '$id'");
          $mysql->close();
     }
     public function password_update($id, $password){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("UPDATE `users` SET `password` = '$password' WHERE `id_user` = '$id';");
          $mysql->close();

     }

     function createDatabaseBackup(){
    $backupDir = ROOT.'/'; 

    date_default_timezone_set('Europe/Kiev');


    $currentTime = time();

    $backupTime = strtotime(date('Y-m-d 23:00:00'));

    if ($currentTime > $backupTime) {

        $filename = 'backup_' . date('Y-m-d') . '.sql';
        $filePath = $backupDir . $filename;

        if (!file_exists($filePath)) {
            $command = "mysqldump --user=root --password=root --host=localhost coursework > {$filePath}";
            exec($command);
        }
    }
}


}