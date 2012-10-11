<?php $this->load->view('common/slider'); ?>
<div class="left-container">
<h2>Search</h2>
<?=form_open('search/results/'.urlencode(set_value('keyword', $keyword)))?>
<input type="search" name="keyword" required="required" placeholder="Search songs here.." value="<?=set_value('keyword', $keyword)?>" style="padding: 8px; width: 80%" />
<input type="submit" value="Search" style="padding: 6px;" class="button" />
<?=form_close()?>

<br />
<div>
<?php 
	if (empty($searchResults) && $searchResults != NULL) {
	?>
     <div style="background:#CCCCCC; padding: 5px; border-top: 1px solid #999;">
    	<b>Search Results</b>
    </div><br />
    <div style="padding-left: 20px;">No results found.</div>
    <?php
	}  else if ($this->input->post('keyword')) {
	?>
    <div style="background:#CCCCCC; padding: 5px; border-top: 1px solid #999;">
    	<b>Search Results</b> <em><?=$keyword?></em>
    </div>
    <?php
	if(empty($searchResults)) {
	?>
    <br />
    <div style="padding-left: 20px;">No results found.</div>
    <?php
	}
	?>
    <?php	
	}

	if (! empty($searchResults)) {
		foreach($searchResults as $index => $hymn) {
		?>
		<div class="cat" style="padding: 10px;">
			<div class="story-title">
				<a href="<?=site_url('hymn/view/'.$hymn['hymn_id'])?>"><?=$hymn['title']?></a> &nbsp;
			</div>
			<div class="story-content">
				<?=substr($hymn['description'],0,120)?>...
			</div>
			<div style="margin-top: 5px;">
				<em class="date-added">( added <?=date('M d, Y', strtotime($hymn['date_added']))?> )</em>
			</div>
		</div>
		<?php
		}
	}
?>
	<br />
	<div align="center">
    	<?=$links?>
    </div>
</div>
<br /><br />
<br />
<hr />
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

</div>

<div class="right-container">
	<?php
		$this->load->view('home-categories');
	?>
</div>
<br class="clear" />