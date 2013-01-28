<div class="left-container">
    <div class="story-read-title">
        <?=$story->title?>
    </div>
    <div>
    	<a href="">Listen to Audio</a>&nbsp;|&nbsp;
       	<a href="">Watch Video</a>
    </div>
    <div class="story-read-content">
        <?=$story->contents?>
    </div>
</div>

<div class="right-container">
	<?php
		$this->load->view('search');
	?>
</div>
<br class="clear" />