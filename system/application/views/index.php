		<div data-role="page" id="index">
		
			<div data-role="header">
				<h1>Home</h1>
				<a href="<?php echo site_url('browse/sections'); ?>" class="ui-btn-right" data-icon="check" data-theme="a">Edit</a>
				
			</div>
		
			<div data-role="content">	
			
				<?php foreach($sections as $s) { ?>	
					
					<?php if(!empty($articles[$s])) { ?>
					<h1 class="section"><?php echo ucwords($s); ?></h1>
					
						<?php foreach($articles[$s] as $a) { ?>
							<div class="article">
								<h2><a href="<?php echo $url = site_url('browse/article/' . str_replace('/', '_', $a->id)); ?>"><?php echo $a->fields->headline; ?></a></h2>
								<?php if(isset($a->fields->thumbnail)) { ?>
									<a href="<?php echo $url; ?>" class="inline-pic"><img src="<?php echo $a->fields->thumbnail; ?>" /></a>
								<?php } ?>
								<?php echo $a->fields->trailText; ?>
							</div>
						<?php } ?>
					
					<?php } ?>
					
				<?php } ?>
				
			</div>
		</div>



