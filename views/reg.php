<?php getHeader($data);?>

<style>
    .error {color: #FF0000;}
</style>

<div class="container"style="padding-top: 20px" >    
    <div class="register-top heading" style="display:flex; align-items: flex-end;">
        <h2>Регистрация</h2>
        <p style="padding-left: 10px;"><span class="error">* обязательное поле</span></p>                        
    </div>
    <div class="col-md-6 account-left ">
        <form action="/save_user.php" method="post">        
            <p>
                <label>Ваш логин:<span class="error">* <br></span></label>            
                <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?php echo !empty($f['valid_login']) ? $f['valid_login'] : ''; ?>" /> 
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
                <label >E-mail: <span class="error">* <br></span></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo !empty($f['valid_email']) ? $f['valid_email'] : ''; ?>" /> 
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
                <input type="submit" name="submit" value="Зарегистрироваться" style="background-color: aquamarine">        
            </p>
        </form>
        <!-- <form action="/" method="post">
            <p>
                <input type="submit" name="exit" value="Exit" style="background-color: red">        
            </p>
            <?php
            if (!empty($_POST['exit'])){
                unset ($_SESSION['login']);
                unset ($_SESSION['id']);
            }
            ?>
        </form>             -->
    </div>    
</div>



<!-- <div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>REGISTER</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="user/signup" id="signup" role="form">
                                <div class="form-group">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <label for="pasword">Password</label>
                                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                </div>
                                <button type="submit" class="btn btn-default">Зарегистрировать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php getFooter($data); ?>