<?php 
if($_SESSION['role'] === 'admin'){
    
    $order['data_create'] = $_POST['order_delete'];
    $order_id[] = $_GET['delete_id'];
    
    //вытягиваем места для каждого заказа данного юзера
    foreach($order_id as $key => $value){ 
        $place_id[$value] = getPlaceByUser($value, $connect);            
    }    

    //извлечения данных из БД по выбранным местам в зале
    foreach($place_id as $key => $value){           
        $order['place'] = getPlaceSelect($value, $connect);
    }  

    $data = $order;

    if(!empty($_POST['deleted_order'])){

        $order_id = $_GET['delete_id'];
       
        //удаляем заказ по $order_id
        $delete_by_order = "DELETE FROM `orders` WHERE `order_id` = $order_id";
        mysqli_query($connect, $delete_by_order);

        $order_place = $order['place'];       

        //меняем статус выбранного места свободно/занято
        foreach($order_place as $key => $value){           
            $place = $value['place_id'];
            $status = "UPDATE `zal` SET `status`= '1' WHERE `place_id` = $place";
            mysqli_query($connect, $status);
        }
        $_SESSION['deleted_order'] = "Заказ успешно удален";
        getView('delete');
    }else{        
        getView('delete', $data);
    }
    
}else{
    getView('author');
}









?>