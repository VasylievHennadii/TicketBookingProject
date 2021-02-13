<?php 

if (!empty($_POST['exit'])){
    unset($_SESSION['zakaz_place']);    
}

$place = numberOfTickets();
debug($place);

getView('cart');
