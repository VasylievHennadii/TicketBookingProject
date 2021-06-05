<?php 
if($_SESSION['role'] === 'admin'){
    $order['data_create'] = $_POST['order_view'];
    $order_id[] = $_GET['view_id'];
    
   //вытягиваем места для каждого заказа данного юзера
   foreach($order_id as $key => $value){ 
       $place_id[$value] = getPlaceByUser($value, $connect);            
   }    

   //извлечения данных из БД по выбранным местам в зале
   foreach($place_id as $key => $value){           
       $order['place'] = getPlaceSelect($value, $connect);
   }  
   
    $data = $order; 

    getView('view', $data);
}else{
    getView('author');
}









?>