
<div class="mod-header">
	Most Popular Songs
</div>
<div class="mod-contents">
	<?php
	foreach($hymns as $index => $hymn) {
	?>
    <div class="cat">
		<div class="story-title">
			<a href="<?=site_url('hymn/view/'.$hymn['hymn_id'])?>"><?=$hymn['title']?></a>
		</div>
		<div class="story-content">
			<?=substr($hymn['description'],0,120)?>...
		</div>
        <div style="margin-top: 5px;">
        	<em class="date-added">( <?=$hymn['num_views']?> views )</em>
        </div>
        <hr style="border: none; height: 1px; background: #ccc;" />
        <br />
	</div>
    <?php	
	}
	?>
	
	<br />
    <div align="left">
    	<a href="<?=site_url('hymn/most_popular');?>">More...</a>
    </div>
</div>