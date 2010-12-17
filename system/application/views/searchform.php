<div data-role="page" id="index">
	<form method="post" action="<?php echo site_url('browse/search'); ?>">
		<div data-role="fieldcontain">
		    <label for="name">Search term:</label>
		    <input type="text" name="search" id="search" value=""  />
		</div>	
	
		<input type="submit" data-inline="true" value="Search" />
	</form>
</div>