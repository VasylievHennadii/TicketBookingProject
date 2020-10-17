<?php 
if($_SESSION['role'] === 'admin'){
    getView('admin');
}else{
    getView('author');
}



















?>