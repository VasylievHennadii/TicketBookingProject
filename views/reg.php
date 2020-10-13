<?php getHeader($data);?>
<?php $f = $_SESSION;?>

<style>
    .error {color: #FF0000;}
</style>

<div class="container" style="padding-top: 20px; display: flex">     
    <div class="container" >    
        <div class="register-top heading" style="display:flex; align-items: flex-end;">
            <h2>Регистрация</h2>
            <p style="padding-left: 10px;"><span class="error">* обязательное поле</span></p>                        
        </div>
        <div class="col-md-12 account-left ">
            <form action="<?= mylink('reg'); ?>" method="post">        
                <p>
                    <label>Ваше имя:<span class="error">* <br></span></label>            
                    <input type="text" name="login" class="form-control" id="login" placeholder="Имя" value="<?php echo !empty($f['valid_login']) ? $f['valid_login'] : ''; ?>" /> 
                    <?php if(!empty($f['error_login'])) { ?>
                    <span class="error"> <?php echo $f['error_login']; ?></span> 
                    <?php } ?>  
                </p>        
                <p>
                    <label>Ваш пароль:<span class="error">* <br></span></label>            
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> 
                    <?php if(!empty($f['error_password'])) { ?>
                    <span class="error"> <?php echo $f['error_password']; ?></span> 
                    <?php } ?>             
                </p>  
                <p>
                    <label>Повтор пароля:<span class="error">* <br></span></label>            
                    <input type="password" name="passwordDubl" class="form-control" id="passwordDubl" placeholder="Repeat Password" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> 
                    <?php if(!empty($f['error_passwordDubl'])) { ?>
                    <span class="error"> <?php echo $f['error_passwordDubl']; ?></span> 
                    <?php } ?>             
                </p>
                <p>
                    <label >Ваш E-mail: <span class="error">* <br></span></label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail" value="<?php echo !empty($f['valid_email']) ? $f['valid_email'] : ''; ?>" /> 
                    <?php if(!empty($f['error_email'])) { ?>
                    <span class="error"> <?php echo $f['error_email']; ?></span> 
                    <?php } ?>  
                </p>
                <p>
                    <label >Tel:  <span class="error">* <br></span></label>
                    <input type="text" name="tel" class="form-control" id="tel" placeholder="Телефон" value="<?php echo !empty($f['valid_tel']) ? $f['valid_tel'] : ''; ?>" /> 
                    <?php if(!empty($f['error_tel'])) { ?>
                    <span class="error"> <?php echo $f['error_tel']; ?></span> 
                    <?php } ?>  
                </p>
                <p>
                    <input type="submit" name="submit" value="Зарегистрироваться" class="btn" style="background-color: aquamarine">    
                            
                </p>
            </form>            
        </div>  
    </div>
    <div class="container col-md-6 " style="padding-top: 10px; padding-left: 100px">
        <img src="/image/hauser.jpeg" style="max-width: 70%; height: auto;" alt="user image"><br><br>
        <!-- <div>
            <a href='<?= mylink('order'); ?>'><<< Продолжить бронирование без регистрации >>></a>
        </div>         -->
        <form action="<?= mylink('home'); ?>" method="post">
            <p>
                <input type="submit" name="exit" value="ВЫХОД" class="btn" style="background-color: red">        
            </p>    
        </form>  
    </div>
</div>





<?php getFooter($data); ?>