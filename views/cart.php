<?php getHeader($data);?>
<?php 
$order = $data;
debug($order);
?>



<!-- <div class="container" style="padding: 10;margin-top: 20px;">

    
    <section class="content-header" style="display: flex; justify-content: space-between; background-color: #e9ecef; padding: 0 10;">
        <h1>
            Список заказов
        </h1>
        <ol class="breadcrumb" style="margin-bottom: unset;">
            <li style="padding-right: 10px;  padding-top: 5px;"><a href="/" style="color: #444;
        text-decoration: none;"><i class="fas fa-tachometer-alt"></i> Главная</a></li>
            
        </ol>
    </section>

    
    <section class="content" style="margin-top: 2px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Покупатель</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php //foreach($orders as $order): ?>
                                    <?php $class = $order['status'] ? 'success' : ''; ?>
                                    <tr class="<?=$class;?>">
                                        <td><?=$order['id'];?></td>
                                        <td><?=$order['name'];?></td>
                                        <td><?=$order['status'] ? 'Завершен' : 'Новый';?></td>
                                        <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                        <td><?=$order['date'];?></td>
                                        <td><?=$order['update_at'];?></td>
                                        <td><a href="<?//=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="far fa-eye"></i></a> <a class="delete" href="<?//=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fas fa-times text-danger"></i></i></a></td>
                                    </tr>
                                <?php //endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>(<?=count($orders);?> заказа(ов) из <?=$count;?>)</p>
                            <?php if($pagination->countPages > 1): ?>
                                <?=$pagination;?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     

</div> -->



<!-- <?php //if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
            <?php //foreach($session['cart'] as $id => $item):?>
                <tr>
                    <td><?= $item['img']?></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                    <td><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php //endforeach?>
                <tr>
                    <td colspan="4">Итого: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="4">На сумму: </td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php // else: ?>
    <h3>Корзина пуста</h3>
<?php //endif;?> -->





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