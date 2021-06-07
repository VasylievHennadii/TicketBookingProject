<?php getHeader($data);?>
<?php 
if(!empty($data)){
    $order_id = $data['order_id'];
    $booking_order = $data['booking'];
    $order = $data;    
}

?>


<!--prdt-starts-->
<div class="prdt" >
    <div class="container" style="padding: 50; min-height: 400px; margin-top: 40px;">
        <div class="prdt-top">
            <div class="col-md-12">
            <h3>Кабинет пользователя <strong><b><?= $_SESSION['login']?></b></strong></h3>
                <?php if(!empty($_SESSION['excellent'])): ?>
        <!-- booking_order -->
                <div class="product-one cart" style="padding-bottom: 100px;">
                    <div class="register-top heading">
                        <h2 style="color: green;"><?= $_SESSION['excellent']; ?><br> Ожидайте звонка оператора или подтверждения на email</h2>
                    </div>
                    <?php if($_SESSION['role'] === 'user' && !empty($_SESSION['excellent'])):?>
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
                                <?php foreach($booking_order as $items => $place):?>                                    
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
                        <h3>Забронированных заказов пока нет...</h3>
                    
                </div>
                <?php endif;?>
        <!-- booking_order -->
                <?php 
                unset($_SESSION['excellent']); 
                unset($_SESSION['zakaz_place']);
                ?>
                <?php elseif(empty($_SESSION['excellent']) && !empty($order)): ?>
                <?php foreach($order as $key => $value):?>
        <!-- all order -->
                <div class="product-one cart" style="padding-bottom: 100px;">
                    <div class="register-top heading">
                        <h2>Номер заказа: № <?=$key?> </h2>
                    </div>
                    
                    <?php if($_SESSION['role'] === 'user' ):?>
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
                                <?php foreach($value as $items => $place): ?>                                    
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
                        <h3>Забронированных заказов пока нет...</h3>
                    <?php endif;?>
                </div>
        <!-- all order -->
                <?php endforeach;?>
                <?php endif;?>
            </div>

        <!-- btn -->
            <div style="display: flex; justify-content: space-between;">
                <form action="" method="get" style="margin-top: auto; margin-bottom: auto;">                
                    <button name="route" value="order" class="btn" style="background-color: aquamarine; margin: 20px;">
                    Продолжить покупки
                    </button>    
                </form>
            </div>
        <!-- btn -->

        </div>
    </div>
</div>
<!--product-end-->



<?php getFooter();?>
