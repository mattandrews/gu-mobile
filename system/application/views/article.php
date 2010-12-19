		<div data-role="page" id="index">
		
			<div data-role="header">
				<h1>Article</h1>
			</div>
			
			<?php show_navbar(); ?>
		
			<div data-role="content" class="article">	
					<h1 class="section <?php echo $article->sectionId; ?>"><?php echo $article->fields->headline; ?></h1>
					
					<?php if(isset($article->fields->standfirst)) { ?>
					<h2><?php echo $article->fields->standfirst; ?></h2>
					<?php } ?>
										
					<div class="byline">
						<?php if(isset($article->fields->byline)) { ?>
						<h3><?php echo $article->fields->byline; ?></h3>
						<?php } ?>
						<p>Posted on <?php echo date('l j F Y G.i e', strtotime($article->webPublicationDate)); ?> in <a href="<?php echo site_url('browse/bysection/' . $article->sectionId); ?>"><?php echo $article->sectionName; ?></a></p>
					</div>	
					
					<?php if(!empty($media)) {
							foreach($media as $m) {
								if($m->fields->width == '460') { ?>
									<img src="<?php echo $m->file; ?>" class="gallery" />
									<p class="caption"><?php echo $m->fields->caption; ?></p>
								<?php }
							}	
					 } ?>
					<?php echo $article->fields->body; ?>
				
				<?php if(!empty($related)) { ?>
					<h3 class="serif">Related Content</h3>
					<div class="related">
					<ul>
					<?php foreach($related as $r) { ?>
						<li><a href="<?php echo site_url('browse/article/' . str_replace('/', '_', $r->id)); ?>"><?php echo $r->webTitle; ?></a> 
						<?php echo date('j M Y (H:i)', strtotime($r->webPublicationDate)); ?></li>
					<?php } ?>
					</ul>
					</div>
				<?php } ?>
				
				<?php if(!empty($comments)) { ?>
				<h3 class="serif">User Comments</h3>
				
					<?php foreach($comments as $c) { ?>
						<div class="user-comment">
							<h4><?php echo $c['author']; ?></strong></h4>
							<h5><?php echo $c['date']; ?></h5>
							<?php echo $c['comment']; ?>
						</div>
					<?php } ?>
				
				<?php } ?>
				
			</div>
		</div>



