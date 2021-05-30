<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/image/star.png" type="image/png" >
    <link rel="stylesheet" href="/views/css/normalize.css">
    <link rel="stylesheet" href="/views/css/bootstrap.css">
    <link rel="stylesheet" href="/views/css/style.css">
    <link rel="stylesheet" href="/views/style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="/views/js/jQuery-3.3.1.js"></script>
    <script src="/views/js/bootstrap.min.js"></script>
     <script src="./js/popper.min.js"></script> 
    <title>TESTSITE</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="col-md-6 top-header-left">
                <a class="navbar-brand" href="/">TESTSITE.COM</a>                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-md-6 ">
                <div class="collapse navbar-collapse " id="navbarText">                   
                    <div class="d-flex justyfi-content-center align-items-center">                        
                        <div class="order col-md-8">
                            <?php if(empty($_SESSION['login'])): ?>
                                <span class="order-number">Вы вошли на сайт, как гость</span>
                            <?php else:?>
                                <span class="order-number">Вы вошли на сайт, как <?=$_SESSION['login'];?></span>
                            <?php endif;?> 
                            
                        </div>
                        <div class="col-md-6" style="text-align: center; cursor: pointer;">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if(!empty($_SESSION['login'] )): ?>
                                    <li><span class="dropdown-item"> Добро пожаловать, <?=$_SESSION['login'];?></span></li>
                                    <?php if($_SESSION['role'] === 'user'): ?>
                                        <li><a class="dropdown-item" href="<?=mylink('cabinet');?>">Кабинет</a></li>
                                    <?php endif;?>
                                    <li><a class="dropdown-item" href="<?=mylink('logout');?>">Выход</a></li>
                                <?php else:?>   
                                    <li><a class="dropdown-item" href="<?=mylink('author');?>">Вход</a></li>
                                    <li><a class="dropdown-item" href="<?=mylink('reg');?>">Регистрация</a></li>
                                <?php endif;?>
                            </ul>
                        </div>
                        <div class="col-md-4 navbar-text" style="text-align: end;">
                            <?php if($_SESSION['role'] && $_SESSION['role'] === 'admin'): ?>
                                <a href='<?= mylink('admin'); ?>'><i class="fa fa-user" aria-hidden="true"></i><span><small>admin</small></span></a>
                            <?php else: ?>
                               <a href="<?=mylink('cart');?>"><i class="fas fa-shopping-cart"></i></a> 
                            <?php endif;?>                            
                        </div>        
                    </div>
                </div>
            </div>
        </nav>
    </header>



     