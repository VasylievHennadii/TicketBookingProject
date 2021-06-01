# ТЗ на проект.

Концертный зал.

Имеется концертный зал с фиксированным набором посадочных мест, разбитых на категории (партер, бельэтаж, балкон и др.) Необходимо дать возможность клиентам бронировать места, заказ мест включает в себя имя клиента, категорию, кол-во мест. Имеется лимит числа билетов, которые может купить один человек. Билеты имеют разную цену и после заказа клиенту сообщают его стоимость. Возможно, стоит выводить схему зала с цветовой разметкой проданных мест и обозначением разных категорий. Учесть, что количество категорий билетов должно быть в пределах 3..5, общее число мест в каждой категории в пределах 10..50.
Все данные хранятся в таблице БД.
Задан лимит числа билетов на один заказ.  
--у нас лимит билетов - 5 штук в одни руки любой категории. 
При этом сайт имеет такие разделы: 
--есть зал с выводом и выбором всех свободных мест. В зале отображается список категорий с указанием свободных мест и общего их числа для каждой категории. В зале также есть форма для заказа билетов, отображается лимит билетов.
--есть корзина с выбранными местами и возможностью редактирования и бронирования мест. Формирование и подтверждение заказа пользователя с указанием выбранных мест, количества, ряд, место, категорию и цену за каждое место. Итоговое количество мест и общую сумму.
--кабинет пользователя, в котором выводятся все заказы данного пользователя. С указанием номера заказа, количество выбранных мест, категория и цена мест. Выводится сумма заказа.
--есть админка с выводом всех заказов и возможностью удаления заказов пользователей. В разделе представлен список заказов, с указанием номера, датой создания заказа, имени клиента, категории и числа мест и кнопкой удаления для каждого заказа.

### table: users

user_id AI

user_name

user_email

user_tel

password


### table: zal

place_id AI

place_name

category_id

status


### table: category

category_id AI

category_name

price


### table: orders

order_id AI

user_id


### table: order_place

order_place_id AI

order_id

place_id
