<?php 

if (!empty($_POST)){
	$data = $_POST;
    author($data, $connect); 
    getView('author');   
}

getView('author');