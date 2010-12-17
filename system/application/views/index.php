		<div data-role="page" id="index">
		
			<div data-role="header">
				<h1>Home</h1>
				<a href="<?php echo site_url('browse/sections'); ?>" class="ui-btn-right" data-icon="gear" rel="external" data-theme="a">Edit</a>
			</div>
			
			<?php show_navbar(); ?>
		
			<div data-role="content">	
			
				<?php foreach($sections as $s) { ?>	
					
					<?php if(!empty($articles[$s])) { ?>
					<?php if(isset($search)) { ?>
					<h1 class="section">Search results for "<?php echo $search; ?>"</h1>
					<?php } else { ?>
					<h1 class="section <?php echo $s; ?>"><a href="<?php echo site_url('browse/bysection/' . $s); ?>"><?php echo ($s=='news') ? 'Top Stories' : $articles[$s][0]->sectionName; ?></h1>
					<?php } ?>
						<?php foreach($articles[$s] as $a) { 
							$url = site_url('browse/article/' . str_replace('/', '_', $a->id)); ?>
							<div class="article">
								<?php if(isset($a->fields->thumbnail)) { ?>
									<a href="<?php echo $url; ?>" class="inline-pic"><img src="<?php echo $a->fields->thumbnail;?>" /></a>
								<?php } ?>
								<h2><a href="<?php echo $url; ?>"><?php echo $a->fields->headline; ?></a></h2>
								<?php echo $a->fields->trailText; ?>
							</div>
						<?php } ?>
					
					<?php } ?>
					
				<?php } ?>
				
			</div>
			
			<?php if(isset($pagination)) { ?>
					<div data-role="footer"> 
					<?php if(!isset($page)) { $next_page = 2; $prev_page = FALSE; } else { $next_page = $page+1; $prev_page = $page-1; } ?>
					<?php if($prev_page) { ?>
					<a class="ui-btn-left" data-role="button" data-icon="arrow-l" href="<?php echo site_url('browse/bysection/' . $s . '/' . $prev_page); ?>">prev page</a>
					<?php } ?>
					<a class="ui-btn-right" data-role="button" data-icon="arrow-r" href="<?php echo site_url('browse/bysection/' . $s . '/' . $next_page); ?>">next page</a>
			<?php } ?>
			
		</div>



