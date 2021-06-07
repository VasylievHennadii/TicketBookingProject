<?php 

function getView($name, $data = ''){
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/views/".$name.".php";
}


function getHeader($data = ''){
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/header.php";
}


function getFooter($data = ''){
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/footer.php";
}


function mylink($name, $id = ''){
    if(!empty($id)){
        return '/index.php?route='.$name.'&'.$name.'_id='.$id;
    } else{
        return '/index.php?route='.$name;
    }
}

/**
 * метод дебагга для режима разработки
 */
function debug($arr, $die = false) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if($die) die;
}

/**
 * метод авторизации пользователя
 */
function author($data, $connect){
	$login = !empty(trim($data['login'])) ? trim($data['login']) : null;
    $user_password = !empty(trim($data['password'])) ? trim($data['password']) : null;
    $email = !empty(trim($data['email'])) ? trim($data['email']) : null;
    if($login && $user_password && $email){ 
        $sql_c = "SELECT * FROM `users` WHERE `user_email`='$email' AND `user_name`='$login'";       
        $check_user = mysqli_query($connect, $sql_c);        
        $user = mysqli_fetch_assoc($check_user);         
        if(password_verify($user_password, $user['password'])){            	
            $_SESSION['login']=$user['user_name']; 
	        $_SESSION['id']=$user['user_id'];
	        $_SESSION['email']=$user['user_email'];
	        $_SESSION['tel']=$user['user_tel']; 
	        $_SESSION['role']=$user['role']; 
	        return true;         
        }             
    }
    $_SESSION['error'] = 'Error';
    return false;
}

/**
 * метод обнуляет все сессии
 */
function logout(){
	if(!empty($_SESSION)){
		foreach ($_SESSION as $key =>$v) {
			unset($_SESSION[$key]);
		}
	} 
	return true;       
}

/**
  * функция принимает параметром некий адрес и перенаправляет на него,
  * иначе - обновляет страницу(либо отправляет на главную)
  */
  function redirect($http = false){
    if($http){
       $redirect = $http;
    }else{
       $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("Location: $redirect");
    exit;
 }

/**
  * функция ограничивает количество выбранных билетов
  * 
  */
 function numberOfTickets(){
    if(!empty($_POST['check_list']) && empty($_SESSION['zakaz_place'])) { 
    $place = $_POST['check_list'];
        if(count($place) > 5){
            $_SESSION['error_numberOfTickets'] = 1;
            redirect(mylink('order'));
        }
    $_SESSION['zakaz_place'] = $place;    
    }elseif(!empty($_POST['check_list']) && !empty($_SESSION['zakaz_place'])){
        $place = $_SESSION['zakaz_place'];
        foreach($_POST['check_list'] as $check) {
            if(count($place) < 5){
                array_push($place, $check); 
                $place = array_unique($place, SORT_REGULAR);
                sort($place);   
                $_SESSION['zakaz_place'] = $place;            
            }else{
                $_SESSION['error_numberOfTickets'] = 1;
                redirect(mylink('order')); 
            }    
        } 
    }
    return $place;
 }

/**
 * функция извлечения данных из БД по выбранным местам в зале
 * 
 */
 function getPlaceSelect($place, $connect){
    foreach ($place as $key => $value) {
        $sql_z = "SELECT * FROM zal z LEFT JOIN category c ON (z.category_id=c.category_id) WHERE place_id = $value";
        $check_zal = mysqli_query($connect, $sql_z);
        $ress = mysqli_fetch_assoc($check_zal);  
        $order[] = $ress;
    }
    return $order;
 }

 /**
  * вытягиваем заказы из БД по id юзера
  */
  function getOrderById($id, $connect){
    $sql_c = "SELECT `order_id` FROM `orders` WHERE `user_id` = $id ORDER BY `order_id` DESC";
    $check_order = mysqli_query($connect, $sql_c);       
    while($rez = mysqli_fetch_assoc($check_order)){            
        $order_id[$rez['order_id']] = $rez;           
    }
    
    if(!empty($order_id)){
        $orders = array();        
        foreach($order_id as $item => $value){       
            array_push($orders, $item);       
        }
        return $orders;
    }    
    if(empty($orders)) return false;    
  }

  /**
   * вытягиваем места для данного заказа данного юзера
   */
  function getPlaceByUser($id, $connect){
    $sql_z = "SELECT place_id FROM order_place WHERE order_id = $id";
    $check_zal = mysqli_query($connect, $sql_z);            
    while($ress = mysqli_fetch_assoc($check_zal)){
        $place_id[] = $ress;              
    }   
    $places = array();
    foreach($place_id as $key => $value){ 
        foreach($value as $items){
            array_push($places, $items);
        }
    }  
    return $places;
  }





?>