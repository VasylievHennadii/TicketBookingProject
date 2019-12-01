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

?>