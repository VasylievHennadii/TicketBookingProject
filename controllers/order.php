<?php

$sql_z = "SELECT * FROM zal z LEFT JOIN category c ON (z.category_id=c.category_id)";       
$check_zal = mysqli_query($connect, $sql_z);        
while($ress[] = mysqli_fetch_assoc($check_zal)){
    $zal = $ress;
}
$data['zal'] = $zal;



if(!empty($_SESSION['login']) && !empty($_SESSION['id'])){
    $data['link'] = 'cart';
}else{
    $data['link'] = 'author';
}



getView('order', $data);