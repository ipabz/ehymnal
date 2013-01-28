<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$page_title?></title>
<link rel="stylesheet" href="<?=base_url()?>css/style.css" />
<link rel="stylesheet" href="<?=base_url()?>nivo-slider/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>nivo-slider/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>css/jquery/smoothness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="<?=base_url()?>nivo-slider/demo/scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>nivo-slider/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/globals.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
			effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
			slices: 7, // For slice animations
			boxCols: 4, // For box animations
			boxRows: 8, // For box animations
			animSpeed: 500, // Slide transition speed
			pauseTime: 3000, // How long each slide will show
			startSlide: 4, // Set starting Slide (0 index)
			directionNav: false, // Next & Prev navigation
			directionNavHide: false, // Only show on hover
			controlNav: false, // 1,2,3... navigation
			controlNavThumbs: false, // Use thumbnails for Control Nav
			controlNavThumbsFromRel: false, // Use image rel for thumbs
			controlNavThumbsSearch: '.jpg', // Replace this with...
			controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
			keyboardNav: false, // Use left & right arrows
			pauseOnHover: false, // Stop animation while hovering
			manualAdvance: false, // Force manual transitions
			captionOpacity: 1, // Universal caption opacity
			prevText: 'Prev', // Prev directionNav text
			nextText: 'Next', // Next directionNav text
			beforeChange: function(){}, // Triggers before a slide transition
			afterChange: function(){}, // Triggers after a slide transition
			slideshowEnd: function(){}, // Triggers after all slides have been shown
			lastSlide: function(){}, // Triggers when last slide is shown
			afterLoad: function(){} // Triggers when slider has loaded
		});
});
</script>
</head>

<body>
	<div id="wrapper">
    	<div id="header">
        	<a title="<?=APP_NAME?>" href="<?=site_url('/home')?>">
                
            </a>
            <div class="search-cont">
            	<?php print form_open('search/results/'.urlencode(set_value('keyword'))); ?>
            	<input type="search" name="keyword" required="required" placeholder="Find songs here..." />
            	<input type="submit" name="search" value="Find" />
            	<?php print form_close(); ?>
            </div>
        </div>
        <div id="main-navigation">
        	<?php $this->load->view('common/navigation'); ?>
        </div>
		
		
		
        <div id="main">