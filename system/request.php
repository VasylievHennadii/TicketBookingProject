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

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

// function sql_select($sql, $row = 'rows', $host = HOST, $user = USER, $password = PASSWORD, $database = DATABASE){
//     $connect = mysqli_connect($host, $user, $password, $database);
//     mysqli_query($connect, "SET CHARSET UTF8");
//     $query = mysqli_query($connect, $sql);
//     if($row == 'rows'){
//         while($res[] = mysqli_fetch_assoc($query)){
//             $value = $res;
//         }
//     }elseif($row == 'row'){
//         $value = mysqli_fetch_assoc($query);
//     }
//     return $value;
// }



?>