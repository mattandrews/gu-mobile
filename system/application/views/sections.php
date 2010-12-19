<script type="text/javascript">
$(document).ready(function(){
	$('a#deselect-sections').click(function(){
		$('input[type=checkbox]:checked').click();
	});
});
</script>

<div data-role="page" id="index">

	<div data-role="header">
		<h1>Edit Sections</h1>
	</div>
	
	<?php show_navbar(); ?>
	
	
	<div data-role="content">
	
		<h2>Section Options</h2>
		<div data-role="controlgroup">
			<a href="javascript://" id="deselect-sections" data-icon="minus" data-role="button" data-theme="d">Deselect all</a>
			<a href="<?php echo site_url('browse/resetsections'); ?>" rel="external" data-icon="refresh" data-role="button" data-theme="d">Reset default sections</a>
			<a href="<?php echo site_url('browse/sequencesections'); ?>" rel="external" data-icon="grid" data-role="button" data-theme="d">Customise section order</a>
		</div>
	
		<h2>Choose Sections</h2>
		<form method="post" action="<?php echo site_url('browse/updatesections'); ?>">
			<?php foreach($sections as $s) { ?>
			<div>
			 	<fieldset data-role="controlgroup">
					<input type="checkbox" value="<?php echo $s->id; ?>" name="section_id[]" id="<?php echo $s->id; ?>" class="custom" <?php if(in_array($s->id, $preset_sections)) { echo 'checked="checked" '; } ?>/>
					<label for="<?php echo $s->id; ?>"><?php echo $s->webTitle; ?></label>					
			    </fieldset>
			</div>
			<?php } ?>
			<input type="submit" value="Update Settings" data-icon="check" data-theme="b" id="sections-submit" />
			
		</form>
	</div>

</div>