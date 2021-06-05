<?php 

if (!empty($_POST['exit'])){
    unset($_SESSION['zakaz_place']);    
}

$place = numberOfTickets();

if($place){
	$order = getPlaceSelect($place, $connect);	
}elseif (!$place && $_SESSION['zakaz_place']) {	
	$place = $_SESSION['zakaz_place'];
	$order = getPlaceSelect($place, $connect);		
}

$data = $order;

getView('cart', $data);
