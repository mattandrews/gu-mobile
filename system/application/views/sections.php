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

		<div data-inline="true">
			<a href="javascript://" id="deselect-sections" data-inline="true" data-icon="minus" data-role="button">Deselect all</a>
			<a href="<?php echo site_url('browse/resetsections'); ?>" rel="external" data-inline="true" data-icon="refresh" data-role="button" data-theme="b">Reset default sections</a>
			<a href="<?php echo site_url('browse/sequencesections'); ?>" rel="external" data-inline="true" data-icon="grid" data-role="button" data-theme="b">Customise section order</a>
		</div>
	

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