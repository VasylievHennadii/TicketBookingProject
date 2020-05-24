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
getView('order');