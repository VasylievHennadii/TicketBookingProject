<?php getHeader($data);
    $orders = $data;
?>


<div class="container" style="padding: 50; min-height: 400px;">
    <div class="container" style="padding: 10; max-height: 100%;margin-top: 20px;">

        <!-- Content Header (Page header) -->
        <section class="content-header" style="display: flex; justify-content: space-between; background-color: #e9ecef; padding: 0 10;">
            <h1>
                Список заказов
            </h1>
            <!-- <ol class="breadcrumb" style="margin-bottom: unset;">
                <li style="padding-right: 10px;  padding-top: 5px;"><a href="/" style="color: #444;
            text-decoration: none;"><i class="fas fa-tachometer-alt"></i> Главная</a></li>
                <li class="active">Список заказов</li>
            </ol> -->
        </section>

        <!-- Main content -->
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
                                            <th>Телефон</th>
                                            <th>Email</th>
                                            <th>Дата создания</th>
                                            <th>Сумма</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($orders as $order): ?>
                                        <?php $class = $order['status'] ? 'success' : ''; ?>
                                        <tr class="<?=$class;?>">
                                            <td><?=$order['order_id'];?></td>
                                            <td><?=$order['user_name'];?></td>
                                            <!-- <td><?=$order['status'] ? 'Завершен' : 'Новый';?></td> -->
                                            <td><?=$order['user_tel'];?></td>
                                            <td><?=$order['user_email'];?></td>
                                            <td><?=$order['data_create'];?></td>
                                            <td><?=$order['update_at'];?></td>

                                            <!-- <td><a href="<?//=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="far fa-eye"></i></a> <a class="delete" href="<?//=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fas fa-times text-danger"></i></i></a></td> -->
                                            
                                            <td><a href="<?//=ADMIN;?>/order/view?id=<?=$order['id'];?>"></a> <a class="delete" href="<?//=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fas fa-times text-danger"></i></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <p>(<?=count($orders);?> заказа(ов) из <?=count($orders);?>)</p>
                                <?php if($pagination->countPages > 1): ?>
                                    <?=$pagination;?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

        <!-- <form action="<?= mylink('cart'); ?>" method="get">                
            <button name="route" value="order" class="btn" style="margin-top: 10px; background-color: aquamarine;">
            Продолжить добавление к заказу
            </button>    
        </form> -->

    </div>
</div>




<?php getFooter();?>