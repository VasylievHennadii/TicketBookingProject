<?php getHeader($data);?>

<?php //debug($data);?>
<?php 
foreach($data['zal'] as $key => $value){
    $zal = $value;
   // debug($value);
}
foreach($data['category'] as $key => $value){
    $category = $value;
   // debug($category);
}

?>

<section class="section-place">        
    <div class="container">              
        <div class="row">
            <div class="choice-places col-lg-12">
                <?php foreach($data['zal'] as $key => $zal) : ?>
                    <!-- кнопка -->
                    <div class="wrapper-choice">
                        <input class="d-none" type="checkbox" id="<?=$zal['place_id'];?>">
                        <label for="<?=$zal['place_id'];?>"><?=$zal['place_id'];?></label>
                        <!-- всплывающая подсказка -->
                        <div class="hint">
                            <span class="hint-head">Додати в кошик</span>
                            <span>VIP ПАРТЕР / VIP PARTER, ряд <?=$zal['place_name'];?>, місце: <?=$zal['place_id'];?></span>
                            <span>Ціна 1490.00 грн</span>
                        </div>
                        <!-- /всплывающая подсказка -->
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