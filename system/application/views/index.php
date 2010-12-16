		<div data-role="page" id="index">
		
			<div data-role="header">
				<h1>Home</h1>
				<a href="<?php echo site_url('browse/sections'); ?>" data-rel="dialog" class="ui-btn-right" data-icon="check" data-theme="a">Edit</a>
			</div>
			
			<div data-role="navbar">
				<div class="logo">
					<img src="http://79.125.112.31/ms/ri/aHR0cDovLzc5LjEyNS4xMTIuMzEvbXMvaS9nbm0vNTUie/x:176" />
				</div>
				<ul>
					<li><a href="<?php echo site_url('/'); ?>">Home</a></li>
					<li><a href="#">Sections</a></li>
					<li><a href="<?php echo site_url('browse/galleries'); ?>">Galleries</a></li>
				</ul>
			</div><!-- /navbar -->
			
		
			<div data-role="content">	
			
				<?php foreach($sections as $s) { ?>	
					
					<?php if(!empty($articles[$s])) { ?>
					<h1 class="section"><?php echo ucwords($s); ?></h1>
					
						<?php foreach($articles[$s] as $a) { ?>
							<div class="article">
								<?php if(isset($a->fields->thumbnail)) { ?>
									<a href="<?php echo $url = site_url('browse/article/' . str_replace('/', '_', $a->id)); ?>" class="inline-pic"><img src="<?php echo $a->fields->thumbnail; ?>" /></a>
								<?php } ?>
								<h2><a href="<?php echo $url; ?>"><?php echo $a->fields->headline; ?></a></h2>
								<?php echo $a->fields->trailText; ?>
							</div>
						<?php } ?>
					
					<?php } ?>
					
				<?php } ?>
				
			</div>
		</div>



