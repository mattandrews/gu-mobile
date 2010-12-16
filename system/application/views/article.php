		<div data-role="page" id="index">
		
			<div data-role="header">
				<h1>Article</h1>
			</div>
		
			<div data-role="content">	
					<h1 class="section"><?php echo $article->fields->headline; ?></h1>
					<h2><?php echo $article->fields->byline; ?></h2>
					<?php if(isset($article->fields->standfirst)) { ?>
					<h3><?php echo $article->fields->standfirst; ?></h3>
					<?php } ?>
					<?php if(!empty($media)) {
							foreach($media as $m) {
								if($m->fields->width == '300') { ?>
									<img src="<?php echo $m->file; ?>" />
								<?php }
							}	
					 } ?>
					<?php echo $article->fields->body; ?>
					
				<?php if(!empty($comments)) { ?>
				<h3>User Comments</h3>
				<div class="user-comments">
				<ul data-role="listview" data-theme="c">
				<?php foreach($comments as $c) { ?>
					<li data-role="list-divider">
						<h4><?php echo $c['author']; ?></strong></h4>
						<h5><?php echo $c['date']; ?></h5>
						<?php echo $c['comment']; ?>
					</li>
				<?php } ?>
				</ul>
				</div>
				<?php } ?>
				
			</div>
		</div>



