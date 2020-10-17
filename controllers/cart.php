<?php 

if (!empty($_POST['exit'])){
    unset($_SESSION['zakaz_place']);    
}

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


getView('cart');
