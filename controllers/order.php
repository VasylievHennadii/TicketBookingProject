<?php

$sql_c = "SELECT * FROM category";       
$check_categories = mysqli_query($connect, $sql_c);        
while($res[] = mysqli_fetch_assoc($check_categories)){
    $categories = $res;
}
$data ['category']= $categories;


$sql_z = "SELECT * FROM zal ";       
$check_zal = mysqli_query($connect, $sql_z);        
while($ress[] = mysqli_fetch_assoc($check_zal)){
    $zal = $ress;
}
$data['zal'] = $zal;

getView($_GET['route'], $data);