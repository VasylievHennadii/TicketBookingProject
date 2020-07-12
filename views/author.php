<?php getHeader($data);?>



<!-- <div class="content">
<?php foreach($data['news'] as $news){  ?>
<a href="<?php echo mylink('register'); ?>">Регистрация</a>
<?php } ?>
</div> -->
<!-- <form method="post">
<input type="text" name="name">
<input type="submit" value="send">
</form> -->


<!-- <style>
.error {color: #FF0000;}
</style>
<h2>Личный кабинет пользователя<?php echo" ".$_SESSION['login']."";?></h2>
<h3>Внести изменения в регистрационные данные</h3>
<form action="/save_user_account.php" method="post">        
    <p>
        <label>Ваш логин(изменить):<span class="error">* <br></span></label>            
        <input type="text" name="login" value="<?php echo !empty($f['valid_login']) ? $f['valid_login'] : ''; ?>" /> <?php if(!empty($f['error_login'])) { ?>
        <span class="error"> <?php echo $f['error_login']; ?>
        </span> 
        <?php } ?>  
    </p>        
    <p>
        <label>Ваш пароль(изменить):<span class="error">* <br></span></label>            
        <input type="password" name="password" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> <?php if(!empty($f['error_password'])) { ?>
        <span class="error"> <?php echo $f['error_password']; ?>
        </span> 
        <?php } ?>             
    </p>  
    <p>
        <label>Повтор пароля:<span class="error">* <br></span></label>            
        <input type="password" name="passwordDubl" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> <?php if(!empty($f['error_passwordDubl'])) { ?>
        <span class="error"> <?php echo $f['error_passwordDubl']; ?>
        </span> 
        <?php } ?>             
    </p>
    <p>
        <label >E-mail(изменить): <span class="error">* <br></span></label>
        <input type="text" name="email" value="<?php echo !empty($f['valid_email']) ? $f['valid_email'] : ''; ?>" /> <?php if(!empty($f['error_email'])) { ?>
        <span class="error"> <?php echo $f['error_email']; ?>
        </span> 
        <?php } ?>  
    </p>
    <p>
        <label >Tel(изменить):  <span class="error">* <br></span></label>
        <input type="text" name="tel" value="<?php echo !empty($f['valid_tel']) ? $f['valid_tel'] : ''; ?>" /> <?php if(!empty($f['error_tel'])) { ?>
        <span class="error"> <?php echo $f['error_tel']; ?>
        </span> 
        <?php } ?>  
    </p>
    <p>
        <input style=" background: red;" type="submit" name="submit" value="Изменить">        
    </p>
    </form>
    <form action="index.php" method="post">
        <p>
            <input type="submit" name="output" value="На главную" style=" background: green;">        
        </p>        
    </form> -->



<div class="container" style="padding-top: 40px; display: flex">
    
    <div>
    <h2>Авторизация</h2>    
    <?php
    // $_SESSION['login'] = 'admin';
    // $_SESSION['id'] = 1;
    // Проверяем, пусты ли переменные логина и id пользователя    
    if (empty($_SESSION['login']) or empty($_SESSION['id'])):?> 
        <a href='<?= mylink('reg'); ?>'>Бронирование  доступно только зарегистрированным пользователям</a>
        <br><br>
        <form action="testreg.php" method="post">    
            <p>
                <label>Ваш логин : <br></label>
                <input name="login" type="text" class="form-control" id="login" placeholder="Login">
            </p>                    
            <p>
                <label>Ваш пароль:<br></label>
                <input name="password" type="password" size="15" class="form-control" id="login" placeholder="Login">
            </p>             
            <p>
                <input type="submit" name="submit" value="Войти" style="background-color: aquamarine">            
            </p>
        </form>        
        <br>
        Вы вошли на сайт, как гость<br>
        <a href='<?= mylink('reg'); ?>'><<< Зарегистрироваться >>></a><br><br>
        <!-- <form action="/" method="get">
            <button name="route" value="reg" style="margin-top: 5px; background-color: aquamarine;">
                Зарегистрироваться
            </button>   
        </form> -->
    <?php else:?>    
        Вы вошли на сайт, как <?=$_SESSION['login'];?><br><br>
        <?php if($_SESSION['login']!='admin'): ?> 
            <a  href='<?= mylink('order'); ?>'>Продолжить бронирование</a><br><br>  
        <?php endif;?>
    <?php endif;?>

    <?php if(!empty($_SESSION['login']) && !empty($_SESSION['id'])):?>
        <?php unset($_SESSION['valid_login']);?>
        <?php unset($_SESSION['valid_email']);?>
        <?php unset($_SESSION['valid_password']);?>  
        <?php unset($_SESSION['valid_tel']);?>
        <?php unset($_SESSION['error_login']);?>
        <?php unset($_SESSION['error_email']);?>
        <?php unset($_SESSION['error_tel']); ?>
        <?php unset($_SESSION['error_password']);?>
        <?php unset($_SESSION['error_passwordDubl']);?>

        <?php if($_SESSION['login']=='admin'):?>            
            <form action="admin.php" method="post">
            <p>
                <input type="submit" name="exit" value="Войти в кабинет admin" style=" background: green;">        
            </p>    
            </form> 
        <?php else:?>            
            <form action="user_account.php" method="post">
            <p>
                <input type="submit" name="exit" value="Войти в кабинет" style=" background: green;">        
            </p>    
            </form> 
        <?php endif;?>        
    <?php endif;?>
    <br>
    <form action="<?= mylink('home'); ?>" method="post">
    <p>
        <input type="submit" name="exit" value="ВЫХОД" style="background-color: red">        
    </p>    
    </form>   
    </div>
    <div class="container col-md-6 " style="padding-top: 10px; padding-left: 100px">
        <img src="/image/hauser.jpeg" style="max-width: 60%; height: auto;" alt="user image"><br><br><br>
        <div>
        <?php if (empty($_SESSION['login']) or empty($_SESSION['id'])):?>
            <a href='<?= mylink('order'); ?>'><<< Продолжить бронирование без регистрации >>></a>
        <?php endif;?>
        </div>
    </div>
</div>
    



    <!-- <style>
    .error {color: #FF0000;}
    </style>
        <h2>Регистрация</h2>
        <p><span class="error">* обязательное поле</span></p>
        <br>
        <form action="/save_user.php" method="post">        
        <p>
            <label>Ваш логин:<span class="error">* <br></span></label>            
            <input type="text" name="login" value="<?php echo !empty($f['valid_login']) ? $f['valid_login'] : ''; ?>" /> <?php if(!empty($f['error_login'])) { ?>
            <span class="error"> <?php echo $f['error_login']; ?>
            </span> 
            <?php } ?>  
        </p>        
        <p>
            <label>Ваш пароль:<span class="error">* <br></span></label>            
            <input type="password" name="password" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> <?php if(!empty($f['error_password'])) { ?>
            <span class="error"> <?php echo $f['error_password']; ?>
            </span> 
            <?php } ?>             
        </p>  
        <p>
            <label>Повтор пароля:<span class="error">* <br></span></label>            
            <input type="password" name="passwordDubl" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> <?php if(!empty($f['error_passwordDubl'])) { ?>
            <span class="error"> <?php echo $f['error_passwordDubl']; ?>
            </span> 
            <?php } ?>             
        </p>
        <p>
            <label >E-mail: <span class="error">* <br></span></label>
            <input type="text" name="email" value="<?php echo !empty($f['valid_email']) ? $f['valid_email'] : ''; ?>" /> <?php if(!empty($f['error_email'])) { ?>
            <span class="error"> <?php echo $f['error_email']; ?>
            </span> 
            <?php } ?>  
        </p>
        <p>
            <label >Tel:  <span class="error">* <br></span></label>
            <input type="text" name="tel" value="<?php echo !empty($f['valid_tel']) ? $f['valid_tel'] : ''; ?>" /> <?php if(!empty($f['error_tel'])) { ?>
            <span class="error"> <?php echo $f['error_tel']; ?>
            </span> 
            <?php } ?>  
        </p>
        <p>
            <input type="submit" name="submit" value="Зарегистрироваться">        
        </p>
        </form>
        <form action="testreg.php" method="post">
        <p>
            <input type="submit" name="exit" value="Exit">        
        </p>
        <?php
        if (!empty($_POST['exit'])){
            unset ($_SESSION['login']);
            unset ($_SESSION['id']);
        }
        ?>
        </form> -->


<?php getFooter(); ?>