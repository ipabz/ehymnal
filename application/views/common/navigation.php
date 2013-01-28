
<a href="<?=site_url()?>">
	Home
</a>

<a href="<?=site_url('hymn/new_songs')?>">
	New Songs
</a>

<a href="<?=site_url('hymn/most_popular')?>">
	Top 10
</a>

<?php if (! $this->security_handler->secure_page()) { ?>
<a href="<?=site_url('login')?>">
	Sign In
</a>
<?php } else { ?>
	<a href="<?=site_url('admin/categories')?>">
        Categories
    </a>
    
    <a href="<?=site_url('admin/hymns')?>">
        Hymns
    </a>
    
     <a href="<?=site_url('admin/accounts')?>">
        Accounts
    </a>
    
    
    
    <div class="login-info">
    	Login as [ Administrator ]: <span><?=ucwords($this->session->userdata('first_name').' '.$this->session->userdata('last_name'))?>.</span>&nbsp;
        <a href="<?=site_url('admin/logout')?>">( Logout )</a>
    </div>
<?php } ?>