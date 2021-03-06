<?php getHeader($data);
if(!empty($data) ){
    $order = $data['place'];
    $date_create = $data['data_create'];
}    

   
?>

<!--prdt-starts-->
<div class="prdt" >
    <div class="container" style="padding: 50; min-height: 400px; margin-top: 40px;">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                <?php if(!empty($order) ):?>
                    <div class="register-top heading">
                        <h2 style="color: red;">Вы действительно хотите удалить заказ № <?= $_GET['delete_id']?> от <?=$date_create?></h2>
                    </div>
                    <br><br>
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
                    <?php elseif(!empty($_SESSION['deleted_order'])):?> 
                        <h3><?=$_SESSION['deleted_order'];?></h3>
                        <?php unset($_SESSION['deleted_order']);?>
                    <?php else: ?>
                        <h3>Такого заказа не существует...</h3>
                    <?php endif;?>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <form action="" method="get" style="margin-top: auto; margin-bottom: auto;">                
                    <button name="route" value="admin" class="btn" style="background-color: aquamarine; margin: 20px;">
                    Вернуться к списку заказов
                    </button>    
                </form>

            <?php if(!empty($order)) :?>
                <form action="<?= mylink('delete', $_GET['delete_id']); ?>" method="post" style="margin-top: auto; margin-bottom: auto;">
                    <input type="submit" name="deleted_order" value="Удалить заказ" class="btn" id="<?=$order['order_id'];?>" style="background-color: red">
                </form>                
            <?php endif;?>
            
            </div>
        </div>
    </div>
</div>
<!--product-end-->

<?php getFooter();?>
