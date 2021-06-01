<?php

if($_SESSION['role'] === 'user'){

    if (!empty($_POST['booking'])){
        $user_id = $_SESSION['id'];
        //извлечения данных из БД по выбранным местам в зале
        if($place && empty($_SESSION['zakaz_place'])){
            $order = getPlaceSelect($place, $connect);	
        }elseif (!$place && !empty($_SESSION['zakaz_place'])) {	
            $place = $_SESSION['zakaz_place'];
            $booking_order = getPlaceSelect($place, $connect);           
        }
        
        $data['booking'] = $booking_order;
        
        //записывам бронь заказа в таблицу orders по id юзера
        $res = "INSERT INTO `orders` (`user_id`) VALUES ($user_id)";
        mysqli_query($connect, $res);

        //получаем последний id забронированного заказа
        if($res){
            $sql_o = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
            $check_order = mysqli_query($connect, $sql_o);
            while($rez = mysqli_fetch_assoc($check_order)){            
                $order_id = $rez['order_id'];
            }

            // записываем в таблицу order_place выбранные места по order_id
            foreach($booking_order as $key => $value){
                $place = $value['place_id'];                
                $ress = "INSERT INTO `order_place` (`order_id`, `place_id`) VALUES ($order_id, $place)";
                mysqli_query($connect, $ress);

                //меняем статус выбранного места свободно/занято
                $status = "UPDATE `zal` SET `status`= '0' WHERE `place_id` = $place";
                mysqli_query($connect, $status);
            }
            $_SESSION['excellent'] = 'Ваш заказ успешно забронирован!';
        }
    }else{

        //Реализован вывод всех предыдущих заказов юзера в его кабинете

        $user_id = $_SESSION['id'];
    
        //вытягиваем заказы из БД по id юзера
        $order_id = getOrderById($user_id,$connect);
    
        //вытягиваем места для каждого заказа данного юзера
        foreach($order_id as $key => $value){ 
            $place_id[$value] = getPlaceByUser($value, $connect);            
        }
    
        //извлечения данных из БД по выбранным местам в зале
        foreach($place_id as $key => $value){           
            $order[$key] = getPlaceSelect($value, $connect);
        }  

        $data = $order;
    }
    
    getView('cabinet', $data);
}else{
    getView('author');
}







?>