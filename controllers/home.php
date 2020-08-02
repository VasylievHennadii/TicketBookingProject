<?php

if (!empty($_POST['exit'])){
    logout();    
}

getView('home');
