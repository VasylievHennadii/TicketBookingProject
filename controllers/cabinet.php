<?php

if($_SESSION['role'] === 'user'){

    

    // if($place && empty($_SESSION['zakaz_place'])){
    //     $order = place_select($place, $connect);	
    // }elseif (!$place && !empty($_SESSION['zakaz_place'])) {	
    //     $place = $_SESSION['zakaz_place'];
    //     $order = place_select($place, $connect);
    //     // unset($_SESSION['zakaz_place']);	
    // }
    // debug($place);

    if (!empty($_POST['booking'])){
        //записывам бронь заказа в БД
        

        echo 'записывам бронь заказа в БД';
        //вытягиваем заказы из БД по id юзера
        echo 'вытягиваем заказы из БД по id юзера';

        // unset($_SESSION['zakaz_place']);    
    }

    $user_id = $_SESSION['id'];
    
    //вытягиваем заказы из БД по id юзера
    $order_id = getOrderById($user_id,$connect);

    //вытягиваем места для каждого заказа данного юзера
    foreach($order_id as $key => $value){ 
        $place_id[$value] = getPlaceByUser($value, $connect);            
    }

    //извлечения данных из БД по выбранным местам в зале
    foreach($place_id as $key => $value){
        // debug($value);
        $order[$key] = getPlaceSelect($value, $connect);
    }
    
    
    // var_dump($place_id);

    // debug($zakaz_place);
    // debug($order);
    
    // debug($place_id);

    // debug($order_id);
    



    $data = $order;
    // $data['order_id'] = $order_id;
    // $data['place_id'] = $place_id;
    getView('cabinet', $data);
}else{
    getView('author');
}







?>