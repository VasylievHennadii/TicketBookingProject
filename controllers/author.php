<?php 



if(!empty($_POST['check_list']) && empty($_SESSION['zakaz_place'])) { 
    $z = $_POST['check_list'];
    $_SESSION['zakaz_place'] = $z;
    debug($z);
    
}elseif(!empty($_POST['check_list']) && !empty($_SESSION['zakaz_place'])){
    $z = $_SESSION['zakaz_place'];
    foreach($_POST['check_list'] as $check) {
        array_push($z, $check);                    
    }
    debug($z);
    $_SESSION['zakaz_place'] = $z;
}

if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
	$data = $_POST;
    author($data, $connect); 
    // if($_SESSION['role'] && $_SESSION['role'] === 'admin'){        
    //     getView('admin');
    // }else{        
    //     getView('author');
    // }
    getView('author');
}else{
    getView('author');
}

