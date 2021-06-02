<?php

if (!empty($_SESSION['login']) && !empty($_SESSION['id'])){
  getView('author');
  die;
}

if(empty($_POST['login']) && empty($_POST['email']) && empty($_POST['tel']) && empty($_POST['password']) && empty($_POST['passwordDubl'])){
  unset($_SESSION['error_login']);
  unset($_SESSION['error_email']);
  unset($_SESSION['error_tel']); 
  unset($_SESSION['error_password']);
  unset($_SESSION['error_passwordDubl']);
  getView('reg');

}else{

  $login = trim($_POST['login']);
  $validName = preg_match("/^[a-zA-Z]{4,15}$/i",$login);
  $email = trim($_POST['email']);
  $validEmail = preg_match('/^[\w\-\.]+@[\w\-]+\.[a-z]{2,4}$/i', $email);
  $tel = $_POST['tel'];
  $validTel = strlen($tel);
  $password = trim($_POST['password']);
  $passwordDubl = trim($_POST['passwordDubl']);
  $validPassword = strlen($password);

  if(!empty($_POST['login']) && $validName == true ) {
    $_SESSION['valid_login'] = $login;
    unset($_SESSION['error_login']);  
  } else {
    $_SESSION['error_login'] = 'Поле имя введено неверно';
    unset($_SESSION['valid_login']);  
  }

  if(!empty($_POST['password']) && $validPassword >= 6 && $password==$passwordDubl) {
     $_SESSION['valid_password'] = $password;
     unset($_SESSION['error_password']);
     unset($_SESSION['error_passwordDubl']);
  } elseif (!empty($_POST['password']) && $validPassword >= 6 && $password!=$passwordDubl){
     $_SESSION['error_passwordDubl'] = 'Повтор не соответствует введенному паролю';
     unset($_SESSION['valid_password']);
     unset($_SESSION['error_password']);
  }else {
     $_SESSION['error_password'] = 'Пароль слишком легкий. Не меньше 6 символов';
     unset($_SESSION['valid_password']);
     unset($_SESSION['error_passwordDubl']);  
  }

  if(!empty($_POST['email']) && $validEmail == true ) {
    $_SESSION['valid_email'] = $email;
    unset($_SESSION['error_email']);
  } else {
    $_SESSION['error_email'] = 'Поле почта введено неверно';
    unset($_SESSION['valid_email']);  
  }

  if(!empty($_POST['tel']) && $validTel >= 10 ) {
    $_SESSION['valid_tel'] = $tel;
    unset($_SESSION['error_tel']);
  } else {
    $_SESSION['error_tel'] = 'Поле tel введено неверно';
    unset($_SESSION['valid_tel']);  
  }


  if (!empty($_SESSION['error_login']) || !empty($_SESSION['error_email']) || !empty($_SESSION['error_tel']) || !empty($_SESSION['error_password']) || !empty($_SESSION['error_passwordDubl'])){  
      getView('reg');
    exit;
  }

  

  //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);
  $password = password_hash($password, PASSWORD_DEFAULT);



  // проверка на существование пользователя с таким же email
  $sql_c = "SELECT * FROM users WHERE user_email='$email'";
  $query_c = mysqli_query($connect, $sql_c);
  $myrow = mysqli_fetch_assoc($query_c);  

  if (!empty($myrow['user_email'])) {
     $_SESSION['error_email'] = 'Извините, введённый вами email уже зарегистрирован. Используйте другой email.';
     unset($_SESSION['valid_email']);  
     getView('reg');
     exit;
  } else {
     unset($_SESSION['error_email']);     
  }

  // если такого нет, то сохраняем данные
  $result2 = "INSERT INTO users (user_name,password, user_email, user_tel) VALUES('$login','$password','$email','$tel')";
  mysqli_query($connect, $result2); //добавление нового пoля логин и пароль в таблицу users

  if ($result2 == true){
     //echo "Вы успешно зарегистрированы! Теперь вы можете <a href='".mylink('order')."'>продолжить бронирование</a>";
     $sql_c = "SELECT * FROM users WHERE user_email='$email'";
     $query_c = mysqli_query($connect, $sql_c);
     $myrow = mysqli_fetch_assoc($query_c);
     $_SESSION['login']=$myrow['user_name']; 
     $_SESSION['id']=$myrow['user_id'];
     $_SESSION['email']=$myrow['user_email'];
     $_SESSION['tel']=$myrow['user_tel'];
     $_SESSION['role'] = $myrow['role'];
  } 
  else {
      echo "Ошибка! Вы не зарегистрированы.";    
      echo "Вернуться для регистрации<br><br>" ;
      echo "<a href=".mylink('reg').">Вернуться для регистрации2</a>";
  }

  if(!empty($_SESSION['valid_login']) && !empty($_SESSION['valid_email']) && !empty($_SESSION['valid_tel']) && !empty($_SESSION['valid_password'])) {    
    unset($_SESSION['valid_login']);
    unset($_SESSION['valid_email']);
    unset($_SESSION['valid_password']);  
    unset($_SESSION['valid_tel']);
    unset($_SESSION['error_login']);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_tel']); 
    unset($_SESSION['error_password']);
    unset($_SESSION['error_passwordDubl']);
    
  }


  getView('author');

}