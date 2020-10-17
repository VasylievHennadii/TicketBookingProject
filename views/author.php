<?php getHeader($data);?>

<?php //debug($_SESSION); ?>


<style>
.error {color: #FF0000;}
</style>
<?php if(!empty($_SESSION['error'])): ?>
    <h6 class="error" style="margin-left: 120px;">Не прошли авторизацию. Проверьте правильность заполнения полей</h6>
    <?php unset($_SESSION['error']); ?>
<?php endif;?>
<div class="container" style="padding-top: 40px; display: flex">    
    <div>
        <h2>Авторизация</h2>    
        <?php if (empty($_SESSION['login']) or empty($_SESSION['id'])):?> 
            <a href='<?= mylink('reg'); ?>'>Бронирование  доступно только зарегистрированным пользователям</a>
            <br><br>
            <form action="<?= mylink('author'); ?>" method="post">    
                <p>
                    <label>Ваше имя: <br></label>
                    <input name="login" type="text" class="form-control" id="login" placeholder="Имя">
                </p>  
                <p>
                    <label>Ваш E-mail: <br></label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="E-mail">
                </p>                    
                <p>
                    <label>Ваш пароль:<br></label>
                    <input name="password" type="password" size="15" class="form-control" id="login" placeholder="Password">
                </p>             
                <p>
                    <input type="submit" name="submit" value="Войти" class="btn" style="background-color: aquamarine">            
                </p>
            </form> 
        <?php else:?>    
            Вы вошли на сайт, как <?=$_SESSION['login'];?><br><br>
            <?php if($_SESSION['role']!='admin'): ?> 
                <a  href='<?= mylink('order'); ?>'>Продолжить бронирование</a><br><br> 
                <?php elseif($_SESSION['role'] && $_SESSION['role'] === 'admin'): ?>
                    <a  href='<?= mylink('admin'); ?>'>Панель администратора</a><br><br>
            <?php endif;?>
        <?php endif;?>
    </div>
    <div class="container col-md-6 " style="padding-top: 10px; padding-left: 100px">
        <div class="container col-md-10 ">
            <img src="/image/hauser.jpeg" style="max-width: 60%; height: auto;" alt="user image"><br><br><br>
            <form action="<?= mylink('home'); ?>" method="post">
                <p>
                    <input type="submit" name="exit" value="ВЫХОД" class="btn" style="background-color: red">        
                </p>    
            </form> 
        </div>
    </div>
</div>
    



   


<?php getFooter(); ?>