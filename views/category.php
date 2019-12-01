<?php getHeader($data);?>
<div class="content">
<?php foreach($data['news'] as $news){  ?>
<a href="<?php echo mylink('register'); ?>">Регистрация</a>
<?php } ?>
</div>
<?php getFooter(); ?>