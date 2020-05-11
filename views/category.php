<?php getHeader($data);?>
<div class="content">
<?php foreach($data['news'] as $news){  ?>
<a href="<?php echo mylink('register'); ?>">Регистрация</a>
<?php } ?>
</div>
<form method="post">
<input type="text" name="name">
<input type="submit" value="send">
</form>
<?php getFooter(); ?>