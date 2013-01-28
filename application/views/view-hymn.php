<div class="breadcrumbs">
	<?=$breadcrumbs?>
</div>
<div class="left-container">
	<br />
	<div class="story-read-title"><?=ucwords($theHymn['title'])?></div>
	<?php
	if ($theHymn['audio']) {
	?>
   	<audio controls="controls">
    	<source src="<?=base_url()?>uploads/audio/<?=$theHymn['audio']?>" type="audio/mpeg" />
    </audio>
    <?php
	}
	?>
    <br />
    <br />
    <p>
    	<?=$theHymn['lyrics']?>
    </p>

	<br />
	<br /><br /><br /><br /><br /><br />
	<div>
    <?php
        $this->load->view('top-10');
    ?>
    </div>
</div>
<div>
	&nbsp;
</div>
<div class="right-container">
	<?php
		$this->load->view('home-categories');
	?>
</div>
<br class="clear" />