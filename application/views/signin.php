<?php $this->load->view('common/slider'); ?>
<div class="left-container">
<h2>Sign In</h2>
<div style="width: 70%"><?=$msg?></div>
<?=form_open()?>
<div>
	<input type="search" name="username" value="<?=set_value('username')?>" placeholder="Username" style="padding: 5px;" size="50" />
</div>
<div>
	<input type="password" name="password" placeholder="Password" style="padding: 5px;" size="50" />
</div>
<br />
<input type="submit" value="Sign In" name="login" style="padding: 6px;" class="button" />
</div>
<?=form_close()?>
<div class="right-container">
	<?php
		$this->load->view('home-categories');
	?>
</div>
<br class="clear" />