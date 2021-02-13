<?php 


$place = numberOfTickets();
// debug($place, 1);

if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
	$data = $_POST;    
    author($data, $connect);
    // redirect(mylink('order'));
    if(author($data, $connect) && $_SESSION['role'] == 'admin'){
        redirect(mylink('admin'));
    }elseif(author($data, $connect)){
        redirect(mylink('order'));
    }else{
        redirect(mylink('author'));
    }
}else{
    getView('author');
}

