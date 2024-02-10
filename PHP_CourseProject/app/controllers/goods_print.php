<?php
//ADS, AFTER HEADER PAGE

//GOODS PRINTING
use app\model\goods\Goods_class;
require_once('app/models/goods.php');
$goods = new Goods_class;
$goods_mas = $goods->goods_mass();
$goods_fetsh=3;
$start=0;
$get = $_GET['page'];
$positions = 15*($get-1);
$end = 15*$get;
while ($start < $positions){
     $goods_fetsh = mysqli_fetch_assoc($goods_mas);
     $start++;
}
echo '<div>';
echo '</div>';
while ($goods_fetsh != false && $start < $end && $start >= $position) {
     ?><div class="container"><?php
     for($j = 0; $j < 3 && $goods_fetsh != false; $j++){
               $goods_fetsh = mysqli_fetch_assoc($goods_mas);
               $img = base64_encode($goods_fetsh['img1']);
               if($goods_fetsh['id_goods'] === NULL) continue;
               ?>
               <div class="goods_print mt-4 goods_sizing data-id ="<?=$goods_fetsh['id_goods']?>"">
               <div class="box1">
               <div class="card box1">
               <img class="card-img-top image-maxsize box1" src="data:image/jpeg;base64, <?=$img?>" alt="Card image cap">
               <div class="card-body">
               <h5 class="card-title "><?=$goods_fetsh['name']?></h5>
               <p class="card-text star-color">Рейтинг: <?=$goods->rating_by_id($goods_fetsh['id_goods'])?> <ion-icon name="star"></ion-icon></p>
               <p class="card-text"><?=$goods_fetsh['cost']?> грн. за од.</p>
               <a href="app/views/pages/generation.php?id=<?=$goods_fetsh['id_goods']?>" class="btn btn-outline-primary">Перейти до товару</a>
               </div>
               </div>
               </div> 
               </div>
               <?php
     }
     echo '</div>';
     $start++;
}
echo '<div class="container2">';
echo '</div>';
?>
<div class="position-center numeric-sys">
<button class="btn btn-secondary"><a href="general.php?page=1">1</a></button> -
<?php
require_once('app/models/goods.php');
$goods = new Goods_class;

$goods_count = $goods->goods_all_count();
$row = $goods_count->fetch_row();
$count = $row[0];
$pages = $count/15;

$pages = ceil($pages);
$position = $_GET["page"];
if($pages > 1){
for($i = $position+1; $i < $position+4 && $i != $pages; $i++){
     ?><button class="btn btn-secondary"><a href="general.php?page=<?=$i?>"><?=$i?></a></button><?php
}
} else{
     ?><button class="btn btn-secondary"><a href="">...</a></button><?php
}
?>
</div>

