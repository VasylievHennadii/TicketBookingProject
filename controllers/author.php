<?php 

if (!empty($_POST)){
	$data = $_POST;
    author($data, $connect); 
    if($_SESSION['role'] && $_SESSION['role'] == 'admin'){
        getView('admin');
    }else{
        getView('author');
    }
       
}else{
    getView('author');
}

