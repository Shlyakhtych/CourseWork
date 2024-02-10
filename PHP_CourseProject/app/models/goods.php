<?php
namespace app\model\goods;
use mysqli;
class Goods_class{
     public function goods_mass()
     {
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `goods`");
          $mysql->close();
          return $result;
     }
     public function goods_all_count()
     {
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT count(*) FROM `goods`");
          $mysql->close();
          return $result;
     }
     public function goods_serch_by_name($name)
     {
          $name = '%'.$name.'%';
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `goods` WHERE `name` like '$name'");
          $mysql->close();
          return $result;
     }
     public function goods_serch_by_id($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `goods` WHERE `id_goods` like '$id'");
          $mysql->close();
          return $result;
     }
     public function goods_searh_name_count($name){
          $name = '%'.$name.'%';
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT count(*) FROM `goods` WHERE `name` like '$name'");
          $mysql->close();
          return $result;
     }
     public function comments_array_by_id($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `comments_to_goods` WHERE `id_goods` like '$id'");
          $mysql->close();
          return $result;
     }
     
     public function user_by_id($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `users` WHERE `id_user` like '$id'");
          $mysql->close();
          return $result;
     }
     public function set_comment($rating, $content, $id_user, $id_goods, $user_name){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query(
          "INSERT INTO `comments_to_goods`(`id_user`,`id_goods`, `user_name`, `rating`, `comment`)
          VALUES('$id_user','$id_goods', '$user_name', '$rating', '$content');");
          $mysql->close();
     }
     public function add_to_baket($id_goods, $id_user, $count){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("INSERT INTO `basket` (`id_basket`, `id_user`, `id_goods`, `count`) VALUES (NULL, '$id_user', '$id_goods', '$count');");
          $mysql->close();
     }

     public function rating_by_id($id)
     {
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `comments_to_goods` WHERE `id_goods` like '$id'");
          $fetch = mysqli_fetch_assoc($result);
          $rating_sum=0;
          $i = 0;
          if($fetch!=false){
               for($i = 0; $fetch!=false; $i++){
                    $rating_sum += $fetch['rating'];  
                    $fetch = mysqli_fetch_assoc($result);
               }
              $goods_rating = $rating_sum/$i;
          }else $goods_rating = 0;
          
          
          return $goods_rating;
     }
     public function search_by_material($material){
               $material = '%'.$material.'%';
               $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
               $result = $mysql->query("SELECT * FROM `goods` WHERE `material` like '$material'");
               $mysql->close();
               return $result;
          }
     public function search_by_material_and_type($material, $type){
          $material = '%'.$material.'%';
          $type = '%'.$type.'%';
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `goods` WHERE `material` like '$material' and `type` like '$type'");
          $mysql->close();
          return $result;
          }
     public function user_orders($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `basket` WHERE `id_user` like '$id'");
          $mysql->close();
          return $result;
     }

     public function trader_orders($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("
          SELECT * FROM `basket`
          INNER JOIN `goods` ON `goods`.`id_goods` = `basket`.`id_goods`
          WHERE `id_store` = '$id'");          
          $mysql->close();
          return $result;
     }
     public function basket_delete($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("DELETE FROM `basket` WHERE `id_basket` = '$id'");
          $mysql->close();
     }
     public function user_comments($id_user){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `comments_to_goods` WHERE `id_user` like '$id_user'");
          $mysql->close();
          return $result;
     }
     public function trader_comments($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("
          SELECT * FROM `comments_to_goods`
          INNER JOIN `goods` ON `goods`.`id_goods` = `comments_to_goods`.`id_goods`
          WHERE `id_store` = '$id'");          
          $mysql->close();
          return $result;
     }
     public function comment_delete($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("DELETE FROM `comments_to_goods` WHERE `id_comment` = '$id'");
          $mysql->close();
     }

     public function set_data_to_server($name, $cost, $size, $madeby, $material, $type, $description, $id_store, $img1, $img2, $img3){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("INSERT INTO `goods` (`name`, `cost`, `size`, `made_by`, `material`, `type`, `description`, `id_store`, `img1`, `img2`, `img3`) VALUES ('$name', '$cost', '$size', '$madeby', '$material','$type', '$description', '$id_store', '$img1', '$img2', '$img3');"); 
          $mysql->close();
          //INSERT INTO `goods` (`id_goods`, `name`, `description`, `cost`, `material`, `type`, `size`, `made_by`, `img1`, `img2`, `img3`, `id_store`) VALUES (NULL, '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, '1');
     }
     public function store_by_user_id($id_user){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `stores` WHERE `id_user` like '$id_user'");
          $mysql->close();
          return $result;
     }
     public function trader_goods_list($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("
          SELECT * FROM `stores`
          INNER JOIN `goods` ON `goods`.`id_store` = `stores`.`id_store`
          WHERE `stores`.`id_user` = '$id'");          
          $mysql->close();
          return $result;
     }
     public function goods_delete($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("DELETE FROM `goods` WHERE `goods`.`id_goods` = '$id'");
          $mysql->close();
     }

     public function print_all_users(){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `users` WHERE `trader` = '0'");
          $mysql->close();
          return $result;
     }
     public function print_all_traders(){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT * FROM `users`
          INNER JOIN `stores` ON `stores`.`id_user` = `users`.`id_user`
          WHERE `users`.`trader` = 1");
          $mysql->close();
          return $result;
     }

     public function user_delete($id){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("DELETE FROM `users` WHERE `id_user` = '$id'");
          $mysql->close();
     }
     public function store_delete($id_store){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("DELETE FROM `stores` WHERE `id_store` = '$id_store'");
          $mysql->close();
     }
     public function trader_delete($id_user){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("UPDATE `users` SET `trader` = '0' WHERE `id_user` = '$id_user'");
          $mysql->close();
     }

     public function search_by_name_and_descrip($name, $description){
          $name = '%'.$name.'%';
          $description = '%'.$description.'%';
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("SELECT*FROM `goods` WHERE `name` like '$name' and `description` like '$description'");
          $mysql->close();
          return $result;
     }

     public function update_data($name, $cost, $size, $madeby, $material, $type, $description, $id_store, $id_goods){
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $result = $mysql->query("UPDATE `goods`  SET `name` = '$name', `cost` = '$cost', `size` = '$size', `made_by` = '$madeby', `material` = '$material', `type` = '$type', `description` = '$description', `id_store` = '$id_store' WHERE `id_goods` = '$id_goods'");
          $mysql->close();
     }
     public function img_upload($img, $id_goods, $img_num){
          $img_is = 'img'.$img_num;
          $mysql = new mysqli('localhost', 'root', 'root', 'courseprojectbd');
          $mysql->query("UPDATE `goods` SET `$img_is` = '$img' WHERE `id_goods` = '$id_goods'");
          $mysql->close();
     }
}
