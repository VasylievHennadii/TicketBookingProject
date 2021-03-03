<?php 

if (!empty($_POST['exit'])){
    unset($_SESSION['zakaz_place']);    
}

$place = numberOfTickets();
// debug($place);
// $place = $_SESSION['zakaz_place'];
// debug($place);
if($place){
	$order = place_select($place, $connect);	
}elseif (!$place && $_SESSION['zakaz_place']) {	
	$place = $_SESSION['zakaz_place'];
	$order = place_select($place, $connect);
	// unset($_SESSION['zakaz_place']);	
}

$data = $order;
// debug($order);

getView('cart', $data);
