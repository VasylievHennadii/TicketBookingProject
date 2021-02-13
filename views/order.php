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
        <div>
            <?php if($_SESSION[error_numberOfTickets]): ?>
                <h3>Доступны для заказа максимум 5 билетов</h3>
                <?php unset($_SESSION[error_numberOfTickets]); ?>
            <?php endif; ?>
        </div> 
        <div class="col-6" style="color: rgba(249, 78, 78); ">
        <?php if(!empty($_SESSION['zakaz_place'])):?>
            <h5>Выбраны места: 
            <?php foreach($_SESSION['zakaz_place'] as $value){
                $v .= $value . ', ';                
                } echo rtrim($v, ',');
            ?>
            </h5>
        <?php endif;?>  
        </div>                              
        <div class="row">
            <div class="choice-places col-lg-12">
            <form action="<?= mylink($data['link']); ?>" method="post">
                <?php foreach($data['zal'] as $key => $zal) : ?>
                    <!-- кнопка -->
                    <div class="wrapper-choice">
                        <?php if($zal['status']) :?>                            
                            <input class="d-none" type="checkbox" id="<?=$zal['place_id'];?>" name="check_list[]" value="<?=$zal['place_id'];?>">
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
        <!-- <form action="/" method="get">                 -->
            <button class="btn" style="margin-top: 50px; background-color: aquamarine;">
            Оформить бронь
            </button>    
        </form>                
    </div>            
</section>



<?php getFooter($data); ?>