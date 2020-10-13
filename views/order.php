<?php getHeader($data);?>

<?php //debug($data);?>
<?php 
// foreach($data['zal'] as $key => $value){
//     $zal = $value;
//    debug($value);
// }
// foreach($data['category'] as $key => $value){
//     $category = $value;
//   debug($category);
// }

?>

<section class="section-place">        
    <div class="container">              
        <div class="row">
            <div class="choice-places col-lg-12">
                <?php foreach($data['zal'] as $key => $zal) : ?>
                    <!-- кнопка -->
                    <div class="wrapper-choice">
                        <?php if($zal['status']) :?>                            
                            <input class="d-none" type="checkbox" id="<?=$zal['place_id'];?>">
                            <label for="<?=$zal['place_id'];?>" style="color:
                                    <?php switch ($zal['category_id']) {
                                            case 1:
                                                echo " yellow";
                                                break;
                                            case 2:
                                                echo " dimgray";
                                                break;
                                            case 3:
                                                echo " chocolate";
                                                break;
                                            default:
                                                " black";
                                        }                                
                                    ?>"><?=$zal['place_id'];?>
                            </label>
                                <!-- всплывающая подсказка -->
                                <div class="hint">
                                    <span class="hint-head">Додати в кошик</span>
                                    <span><?=$zal['category_name'];?> , ряд <?=$zal['place_name'];?>, місце: <?=$zal['place_id'];?></span>
                                    <span>Ціна <?=$zal['price'];?> грн</span>
                                </div>
                                <!-- /всплывающая подсказка -->
                        <?php else :?>
                            <input class="d-none" id="<?=$zal['place_id'];?>">
                            <label style="color: rgba(249, 78, 78); background: rgba(249, 78, 78); cursor: default;" for="<?=$zal['place_id'];?>"><?=$zal['place_id'];?></label>
                        <?php endif;?>                  
                    </div>
                    <!-- /кнопка -->
                <?php endforeach;?>
            </div>                
        </div>
    </div>
    <div class="container">
        <form action="/" method="get">                
            <button name="route" value="author" class="btn" style="margin-top: 50px; background-color: aquamarine;">
            Оформить бронь
            </button>    
        </form>                
    </div>            
</section>

<?php getFooter($data); ?>