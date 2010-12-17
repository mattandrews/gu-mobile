<script>
$(document).ready(function(){
	$('ul.sequencer li a.possible').live('click', function(){
		$('a.possible').addClass('receiver').removeClass('possible');
		$(this).removeClass('receiver').addClass('current');
	});

	$('ul.sequencer li a.receiver').live('click', function(){
		var new_item = $('a.current').parent('li');
		new_item.insertBefore( $(this).parent('li') );
		$('a.current').removeClass('current').addClass('possible');
		$('a.receiver').removeClass('receiver').addClass('possible');
	});

	
});
</script>

<style type="text/css">

	ul.sequencer a {
		padding: 10px;
		margin: 10px;
		display: block;
		color: #000;
		text-decoration: none;
		border: 3px solid #ccc;
	} 
	ul.sequencer {
	    margin: 0px;
	    padding: 0px;
	    list-style: none;
	}
	ul.sequencer a.possible {
		background: #efefef;
	}
	ul.sequencer a.current {
		background: #ccc;
		color: #000;
	}
	ul.sequencer a.receiver {
		background: #fff;
		border: 3px dotted #ccc;
	}
	

	
</style>

<div data-role="page" id="index">

	<div data-role="header">
		<h1>Order Sections</h1>
	</div>

	<?php show_navbar(); ?>	

	<form method="post" action="<?php echo site_url('browse/updatesections'); ?>">
	<ul class="sequencer">
	<?php foreach($sections as $s) { ?>
		<li><input type="hidden" name="section_id[]" value="<?php echo $s; ?>" />
		<a class="possible" href="javascript://"><?php echo ucwords($s); ?></a></li>
	<?php } ?>
	</ul>
	<input type="submit" value="Update Settings" data-icon="check" data-theme="b" id="sections-submit" />
	</form>
	
</div>
	