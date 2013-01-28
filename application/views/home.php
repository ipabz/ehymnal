<?php $this->load->view('common/slider'); ?>

<div class="left-container">

	

	<p align="justify">
    <strong>Congratulation's!</strong> You've found the #1 Hymn site on the web, featuring over 10,000, 000 christian hymns, authors Bios, Composer Biographies, Hymn Stories and Gospel songs from many denominations. You'll find lyrics, scores, MIDI files, pictures, history, & more. This worship and teaching resource is provided as public service.
    </p>
	
    
    <br />
    <div>
    <?php
        $this->load->view('new-songs');
    ?>
    </div>
    
    <br />
    <div>
    <?php
        $this->load->view('top-10');
    ?>
    </div>
    
    
    <br />
    
</div>
<div class="right-container">
	<?php
		$this->load->view('home-categories');
	?>
</div>
<br class="clear" />