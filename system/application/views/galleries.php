		<div data-role="page" id="index">
		
			<div data-role="header">
				<h1>Galleries</h1>
			</div>
		
			<div data-role="content">	
				<ul data-role="listview" data-theme="c">
				<?php foreach($galleries as $id=>$g) { ?>	
						<li>
							<img src="<?php echo $g['thumbnail']; ?>" />
							<h3><a href="<?php echo site_url('browse/gallery/' . str_replace('/', '_', $g['id'])); ?>"><?php echo $g['headline']; ?></a></h3>
							<p><?php echo $g['trailText']; ?></p>							
						</li>	
				<?php } ?>
				</ul>
			</div>
		</div>



