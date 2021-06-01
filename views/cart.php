<?php getHeader($data);?>
<?php 
$order = $data;
// debug($order);
?>



<!--prdt-starts-->
<div class="prdt" >
    <div class="container" style="padding: 50; min-height: 400px; margin-top: 40px;">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                    <div class="register-top heading">
                        <h2>Оформление заказа</h2>
                    </div>
                    <br><br>
                    <?php if(!empty($order)):?>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Расположение</th>
                                    <th>Ряд</th>
                                    <th>Место</th>
                                    <th>Цена</th>
                                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; $sum = 0; ?>
                                <?php foreach($order as $key => $place): ?>                                    
                                    <tr>
                                        <td><?=$place['category_name'] ?></td>
                                        <td><?=$place['place_name'] ?></td>
                                        <td><?=$place['place_id'] ?></td>
                                        <td><?=$place['price'] ?></td>
                                        <td><a href="/cart/delete/?id=<?=$id ?>"><span data-id="<?=$id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                                    </tr>
                                    <?php $i++; $sum += $place['price']; ?>
                                <?php endforeach;?>
                                <tr>
                                    <td style="text-align: center;"><b>Итого:</b></td>
                                    <td colspan="4" class="text-right cart-qty"><b><?=$i ?> билетов</b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><b>На сумму:</b></td>
                                    <td colspan="4" class="text-right cart-sum"><b><?= $sum; ?> грн</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>                      
                    <?php else: ?>
                        <h3>Корзина пуста...</h3>
                    <?php endif;?>
                </div>

                <!-- <form action="<?= mylink('cart'); ?>" method="get">                
                    <button name="route" value="order" class="btn" style="margin-top: 10px; background-color: aquamarine;">
                    Продолжить покупки
                    </button>    
                </form>

                <form action="/" method="get">                
                            <button class="btn" style="margin-top: 50px; background-color: aquamarine;">
                            Оформить бронь
                            </button>    
                        </form>   -->


            </div>

            <div style="display: flex; justify-content: space-between;">
                <form action="" method="get" style="margin-top: auto; margin-bottom: auto;">                
                    <button name="route" value="order" class="btn" style="background-color: aquamarine; margin: 20px;">
                    Продолжить покупки
                    </button>    
                </form>

                <!-- <form action="" method="get">                
                    <button name="route" value="logout" class="btn" style="background-color: red; color:beige; margin: 20px;">
                    Сброс корзины
                    </button>    
                </form>  -->
            <?php if(!empty($order)) :?>
                <form action="<?= mylink('cart'); ?>" method="post" style="margin-top: auto; margin-bottom: auto;">
                    <input type="submit" name="exit" value="Сброс корзины" class="btn" style="background-color: red">
                </form> 

                <form action="<?= mylink('cabinet'); ?>" method="post" style="margin-top: auto; margin-bottom: auto;">
                    <input type="submit" name="booking" value="Оформить бронь" class="btn" style="background-color: green; margin: 20px;">  
                </form> 
            <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!--product-end-->


<?php getFooter($data);?>