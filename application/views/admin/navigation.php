<?php if ($this->security_handler->secure_page()): ?>
<a href="<?=site_url('admin/home')?>">Home</a>
<a href="<?=site_url('admin/stories')?>">Stories</a>
<a href="<?=site_url('admin/home/logout')?>">Logout</a>
<?php endif; ?>