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
                            <label for="<?=$zal['place_id'];?>"><?=$zal['place_id'];?></label>
                                <!-- всплывающая подсказка -->
                                <div class="hint">
                                    <span class="hint-head">Додати в кошик</span>
                                    <span><?=$zal['category_name'];?> , ряд <?=$zal['place_name'];?>, місце: <?=$zal['place_id'];?></span>
                                    <span>Ціна <?=$zal['price'];?> грн</span>
                                </div>
                                <!-- /всплывающая подсказка -->
                        <?php else :?>
                            <input class="d-none" id="<?=$zal['place_id'];?>">
                            <label style="background: rgb(223, 33, 8); color: rgba(24, 23, 23, 0.76);" for="<?=$zal['place_id'];?>"><?=$zal['place_id'];?></label>
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