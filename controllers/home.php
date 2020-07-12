<?php

if (!empty($_POST['exit'])){
    unset ($_SESSION['login']);
    unset ($_SESSION['id']);
    unset($_SESSION['valid_login']);
    unset($_SESSION['valid_email']);
    unset($_SESSION['valid_password']);  
    unset($_SESSION['valid_tel']);
    unset($_SESSION['error_login']);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_tel']); 
    unset($_SESSION['error_password']);
    unset($_SESSION['error_passwordDubl']);
    unset($_SESSION['auth']);
}

getView('home');
