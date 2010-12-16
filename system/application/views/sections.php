<div data-role="page" id="index">

	<div data-role="header">
		<h1>All Sections</h1>
	</div>
	
	<div data-role="content">

		<form method="post" action="<?php echo site_url('browse/updatesections'); ?>">
			<?php foreach($sections as $s) { ?>
			<div>
			 	<fieldset data-role="controlgroup">
					<input type="checkbox" value="<?php echo $s->id; ?>" name="section_id[]" id="<?php echo $s->id; ?>" class="custom" <?php if(in_array($s->id, $preset_sections)) { echo 'checked="checked" '; } ?>/>
					<label for="<?php echo $s->id; ?>"><?php echo $s->webTitle; ?></label>					
			    </fieldset>
			</div>
			<?php } ?>
			<input type="submit" value="Update Settings" id="sections-submit" />
			
		</form>
	</div>

</div>