

<div class="left-container">
	
    <div>
    <div class="mod-header">
	New Songs
</div>
<div class="mod-contents">
	<?php
	foreach($newHymns as $index => $hymn) {
	?>
    <div class="cat">
		<div class="story-title">
			<a href="<?=site_url('hymn/view/'.$hymn['hymn_id'])?>"><?=$hymn['title']?></a> &nbsp;
		</div>
		<div class="story-content">
			<?=substr($hymn['description'],0,120)?>...
		</div>
        <div style="margin-top: 5px;">
        	<em class="date-added">( added <?=@date('M d, Y', @strtotime($hymn['date_added']))?> )</em>
        </div>
          <hr style="border: none; height: 1px; background: #ccc;" />
        <br />
	</div>
    <?php	
	}
	?>
	
	<br />
    <div align="center">
    	<?=$pagesLink?>
    </div>
</div>
    </div>
    
    
    <br />
    
</div>
<div class="right-container">
	<?php
		$this->load->view('home-categories');
	?>
</div>
<br class="clear" />
