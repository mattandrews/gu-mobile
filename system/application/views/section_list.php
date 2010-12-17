<div data-role="page" id="section-index">

	<div data-role="header">
		<h1>All Sections</h1>
	</div>
	
	<div data-role="content">
		<ul data-role="listview" data-theme="c">
		<?php foreach($sections as $s) { ?>
				<li><a href="<?php echo site_url('browse/bysection/' . $s->id); ?>"><?php echo $s->webTitle; ?></a></li>
		<?php } ?>
		</ul>		
	</div>

</div>