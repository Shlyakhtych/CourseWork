<?php 
$id = $_GET['id'];
use app\model\goods\Goods_class;
require_once('../../models/goods.php');
$goods = new Goods_class;

     $result = $goods -> goods_serch_by_id($id);
     $a = (mysqli_fetch_assoc($result));
     $img1 = base64_encode($a['img1']);
     $img2 = base64_encode($a['img2']);
     $img3 = base64_encode($a['img3']);
     ?>
     <div class="container form mt-4 goods_sizing" name="tovar_id">
          <?php 
               if(base64_encode($a['img2']) != '' && base64_encode($a['img3']) != ''){
                         ?>
                         <div class=""><img class="img_max-size img_red parent_image card-img-top" src="data:image/jpeg;base64, <?=$img1?>" alt="Card image cap"></div>
                         <div class="col-cintainer">
                         <div class=""><img class="img_red image2 card-img-top image-maxsize box1" src="data:image/jpeg;base64, <?=$img2?>" alt="Card image cap"></div>
                         <div class=""><img class="img_red image2 card-img-top image-maxsize box1" src="data:image/jpeg;base64, <?=$img3?>" alt="Card image cap"></div><?php
                    }
                    if(base64_encode($a['img2']) != '' && base64_encode($a['img3']) == ''){
                         ?>
                         <div class="container2">
                         <div class=""><img class="img_max-size img_red box1 image3 parent_image card-img-top" src="data:image/jpeg;base64, <?=$img1?>" alt="Card image cap"></div>
                         
                         <div class=""><img class="img_red box1 image3 image2 card-img-top image-maxsize" src="data:image/jpeg;base64, <?=$img2?>" alt="Card image cap"></div><?php
                    }
                    if(base64_encode($a['img2']) == '' && base64_encode($a['img3']) == ''){
                         ?>
                         <div class=""><img class="img_max-size img_red parent_image card-img-top" src="data:image/jpeg;base64, <?=$img1?>" alt="Card image cap"></div>
                         <div class="col-cintainer"><?php
                    }
                    
          ?>
     </div>
     <div class="box-generation form3">
     <div class="card-body">
     
     <div class="alert alert-secondary box1" role="alert">
     <h5 class="card-title "><?=$a['name']?></h5>
     <p class="card-text star-color">Рейтинг: <?=$goods->rating_by_id($id)?> <ion-icon name="star"></ion-icon></p>
     <p class="card-text star-color">Тип: <?=$a['material']?></p>
     <p class="card-text star-color">Вид: <?=$a['type']?></p>
     <p class="card-text star-color">Розмір: <?=$a['size']?></p>
     <p class="card-text star-color">Виготовлено: <?=$a['made_by']?></p>
     <div class="gener-btn">
     </div>
     <div class="alert alert-primary box1">
       <form action="../../controllers/ordering.php " method="post">  
          <table>
               <tr>
               <td><textarea class="form-control rt_txtar box2" type="text " title="Кількість" name="count"></textarea></td>
               <td><textarea class="opacity0 micro-size" name="id"><?=$id?></textarea></td>
               <td><button type="submit" class="margleft btn btn-outline-primary">Замовити</button></td>
               </tr>
          </table>
          
     </form> 
     </div>
     <p class="card-text star-color">Вартість: <?=$a['cost']?> за од.</p>
     </div>
     </div>
     </div>
     </div>
     </div>
     <p class="form6 mt-4 gen-description"><?=$a['description']?></p>
     <div class="print-container">

     <div class="mt-4">
     <form name="comment" action="../../controllers/comment_send.php" method="post" id="comment">
        <table >
          <tr><td>Залишити оцінку та коментар:</td></tr>
        <tr>
            <td><input class="form-control rt_txtar" type="text" name="rating"></td>
        </tr>
        <tr>
            <td><textarea class="form-control com_txtar" type="text" name="comment_text"></textarea></td>
            <div class="opacity0"><textarea class="mini-size" type="text" name="gdid"><?=$id?></textarea></div>
        </tr>
        
        <tr><td><button class="btn btn-outline-primary" type="submit">Опублікувати</button></td></tr>        
        </table>
        <div class="mt-4">
        <?
        if($_GET['error'] ==1){
          echo '<div class="alert alert-danger" role="alert">Не правильно введена оцінка!</div>';
        }
        if($_GET['error'] == 2){
          echo '<div class="alert alert-danger" role="alert">Авторизуйтесь!</div>';
        }  ?>
        </div>
    </form>
    <br>
     </div>
     </div>
<div class="mt-4">
<?php $comments_array = $goods -> comments_array_by_id($a['id_goods']); 
$comment = mysqli_fetch_assoc($comments_array);
while($comment != false){ 
     ?>
     <div class="alert alert-secondary mr-4" role="alert">
     <ion-icon name="person"></ion-icon> <?=$comment['user_name'];?> : <?=$comment['rating'];?>/10 <ion-icon name="star"></ion-icon>
     <br>
     <?=$comment['comment'];?>
     </div>   
<?php $comment = mysqli_fetch_assoc($comments_array);
}
?>
</div>
</div>
     
