<?php getHeader($data);?>

    <div class="container" style="display: flex">
        <div style="padding-top: 40px">
            <img src="/image/hauser.jpeg" style="max-width: 100%; height: auto;" alt="user image">
        </div>
        <div class="container" style="padding: 40px">
            <h1>HAUSER, MY TOUR 2020</h1>
            <div style="max-width: 250px">
                <div style="margin-top: 50px">
                    <b>
                        <strong>1690</strong>
                        <strong> - </strong>
                        <strong>9990</strong>
                        <strong>грн</strong>
                         (50+ шт) 
                    </b>
                </div>
                <div style="margin-top: 50px">
                    <span>Можно купить <strong>не больше 5</strong> билетов в одни руки</span> 
                </div>
                <form action="index.php" method="get">                
                    <button name="route" value="order" style="margin-top: 50px; background-color: aquamarine;">
                            Купить
                    </button>    
                </form>
                <!-- <button style="margin-top: 50px; background-color: aquamarine;">
                    <a href="controllers/order.php">Купить</a>
                </button>    -->
                
            </div>
        </div>
    </div>
    

    

<?php getFooter($data); ?>