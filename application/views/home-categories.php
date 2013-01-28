<div class="mod-header">
	Song Categories
</div>
<div class="mod-contents">
	<?php
	foreach($categories as $index => $category) {
	?>
    <div class="cat">
		<div class="story-title">
			<a href="<?=site_url('hymn/category_view/'.$category['category_id'])?>"><?=$category['name']?></a>
		</div>
		<div class="story-content">
			<?=substr($category['description'], 0, 35)?>...
		</div>
	</div>
    <?php
	}
	?>
	<br />
    <div align="right">
    	<a href="<?=site_url('hymn/song_categories')?>">More...</a>
    </div>
</div>