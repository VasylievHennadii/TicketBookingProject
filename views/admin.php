<?php getHeader($data);
    $orders = $data;
   
?>


<div class="container" style="padding: 50; min-height: 400px;">
    <div class="container" style="padding: 10; max-height: 100%;margin-top: 20px;">

        <!-- Content Header (Page header) -->
        <section class="content-header" style="display: flex; justify-content: space-between; background-color: #e9ecef; padding: 0 10;">
            <h1>Список заказов</h1>
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
                                            <!-- <th>Сумма</th> -->
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($orders as $order): ?>
                                        <?php $class = $order['status'] ? 'success' : ''; ?>
                                        <tr class="<?=$class;?>">
                                            <td><?=$order['order_id'];?></td>
                                            <td><?=$order['user_name'];?></td>
                                            <td><?=$order['user_tel'];?></td>
                                            <td><?=$order['user_email'];?></td>
                                            <td><?=$order['data_create'];?></td>
                                            <!-- <td><?=$order['update_at'];?></td> -->
                                            <td style="display: flex;">
                                                <form action="<?= mylink('view', $order['order_id']);?>" method="post" style="margin: 0;">
                                                    <button class="btn" name="order_view" id="<?=$order['order_id'];?>" value="<?=$order['data_create'];?>">
                                                        <a href="<?= mylink('view');?>"><i class="far fa-eye"></i></a>
                                                    </button>
                                                </form>
                                                <form action="<?= mylink('delete', $order['order_id']);?>" method="post" style="margin: 0;">
                                                    <button class="btn" name="order_delete" id="<?=$order['order_id'];?>" value="<?=$order['data_create'];?>">
                                                        <a href="<?= mylink('delete');?>"><i class="fas fa-times text-danger"></i></a>
                                                    </button>
                                                </form>
                                            </td>
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
    </div>
</div>




<?php getFooter();?>