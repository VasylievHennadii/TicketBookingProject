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



<!-- <form action="<?= mylink('order'); ?>" method="post">
    <input type="checkbox" name="check_list[]" value="value 1">
    <input type="checkbox" name="check_list[]" value="value 2">
    <input type="checkbox" name="check_list[]" value="value 3">
    <input type="checkbox" name="check_list[]" value="value 4">
    <input type="checkbox" name="check_list[]" value="value 5">
    <input type="submit" />
</form> -->
<?php
// if(!empty($_POST['check_list'])) {
//     foreach($_POST['check_list'] as $check) {
//             echo $check; //echoes the value set in the HTML form for each checked checkbox.
//                          //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
//                          //in your case, it would echo whatever $row['Report ID'] is equivalent to.
//     }
// }
?>

<?php getFooter($data); ?>