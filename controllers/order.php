<?php

$sql_z = "SELECT * FROM zal z LEFT JOIN category c ON (z.category_id=c.category_id)";       
$check_zal = mysqli_query($connect, $sql_z);        
while($ress[] = mysqli_fetch_assoc($check_zal)){
    $zal = $ress;
}
$data['zal'] = $zal;

// if(!empty($_SESSION['login']) && !empty($_SESSION['id'])){
//     $data['link'] = 'cart';
// }else{
//     $data['link'] = 'author';
// }


// if(!empty($_POST['check_list'])) { 
//     $_SESSION['zakaz_place'] = $_POST['check_list'];
//     $z = $_SESSION['zakaz_place'];
//     debug($z);
//     foreach($_POST['check_list'] as $check) {
//         // $_SESSION['zakaz_place'] = $check;
//              //echo $check; //echoes the value set in the HTML form for each checked checkbox.
//                          //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
//                          //in your case, it would echo whatever $row['Report ID'] is equivalent to.
                         
//     }
// }

if(!empty($_SESSION['login']) && !empty($_SESSION['id'])){
    $data['link'] = 'cart';
}else{
    $data['link'] = 'author';
}



getView('order', $data);