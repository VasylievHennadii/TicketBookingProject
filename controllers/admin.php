<?php 
if($_SESSION['role'] === 'admin'){

    $sql_z = "SELECT * FROM orders ord LEFT JOIN users u ON (ord.user_id=u.user_id) ORDER BY order_id DESC";  
    // $sql_z = "SELECT order_id FROM order_place WHERE place_id";
    $check_zal = mysqli_query($connect, $sql_z);
    $order = [];
    while($ress = mysqli_fetch_assoc($check_zal)){
        $order[$ress['order_id']] = $ress;
    };
    debug($order);
    $data = $order;
    getView('admin', $data);
}else{
    getView('author');
}



















?>