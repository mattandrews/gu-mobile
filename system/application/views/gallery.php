<script>
$(document).ready(function(){

	$('#container').bind('swipeleft',function(event, ui){
		$('#gallery-prev').click();
	});

	$('#container').bind('swiperight',function(event, ui){
		$('#gallery-next').click();
	});
	
	
});
</script>

<div data-role="page" id="<?php echo $gallery['id']; ?>">
	
	<div data-role="header" data-nobackbtn="true" data-position="inline">
		<?php if($offset > 1) { $page = $offset-1;?>
			<a id="gallery-prev" rel="external" data-theme="b" data-icon="arrow-l" href="<?php echo site_url('browse/gallery/' . str_replace('/', '_', $gallery['id']) . '/' . $page); ?>" data-icon="arrow-r"  class="ui-btn-left">Previous</a>
		<?php } ?>
		<h1>Gallery: <?php echo $offset . '/' . count($gallery['photos'])?></h1>
		<?php if($offset < count($gallery['photos'])) { $page = $offset+1;?>
			<a id="gallery-next" rel="external" data-theme="b" data-icon="arrow-r" data-iconpos="right" href="<?php echo site_url('browse/gallery/' . str_replace('/', '_', $gallery['id']) . '/' . $page); ?>" data-icon="arrow-l" data-role="button" class="ui-btn-right">Next</a>
		<?php } ?>
	</div>
	
	<?php show_navbar(); ?>

	<div data-role="content">
		
		<h1 class="section"><?php echo $gallery['headline']; ?></h1>
		<?php if(isset($gallery['standfirst'])) { ?>
		<h2><?php echo $gallery['standfirst']; ?></h2>
		<?php } ?>
		
		<?php $zero_offset = $offset-1; ?>
		<img class="gallery" src="<?php echo $gallery['photos'][$zero_offset]['file']; ?>" />
		<p><?php echo $gallery['photos'][$zero_offset]['caption']; ?></p>
		
		
	</div>
</div>



