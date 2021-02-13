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


function debug($arr, $die = false) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if($die) die;
}


function validReg(){

}


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
            $_SESSION[error_numberOfTickets] = 1;
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
                $_SESSION[error_numberOfTickets] = 1;
                redirect(mylink('order')); 
            }    
        } 
    }
    return $place;
 }

// function sql_select($sql, $row = 'rows', $host = HOST, $user = USER, $password = PASSWORD, $database = DATABASE){
//     $connect = mysqli_connect($host, $user, $password, $database);
//     mysqli_query($connect, "SET CHARSET UTF8");
//     $query = mysqli_query($connect, $sql);
//     if($row == 'rows'){
//         while($res[] = mysqli_fetch_assoc($query)){
//             $value = $res;
//         }
//     }elseif($row == 'row'){
//         $value = mysqli_fetch_assoc($query);
//     }
//     return $value;
// }



?>