<!DOCTYPE html> 
<html> 
	<head> 
	<title>Page Title</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css" />
	<script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			$(document).bind('swipeleft', function(){
				alert('swiped!');
			});
		});
	</script>
	
</head> 
<body> 

		<div data-role="page" id="index">
		
			<div data-role="header">
				<h1>All Articles</h1>
			</div>
		
			<div data-role="content">	
				<ol>
				<?php foreach($articles as $a) { ?>	
					<li><a href="<?php echo '#' . url_title($a->webTitle); ?>"><?php echo $a->webTitle; ?></a></li>
				<?php } ?>
				</ol>
			</div>
		</div>
		
		
		<?php foreach($articles as $a) { ?>

			<div data-role="page" id="<?php echo url_title($a->webTitle); ?>">
			
				<div data-role="header">
					<h1><?php echo $a->webTitle; ?></h1>
				</div>
			
				<div data-role="content">	
					<?php echo $a->fields->body; ?>		
				</div><!-- /content -->
			
				<div data-role="footer">
					<h4>Page Footer</h4>
				</div>
			</div><!-- /page -->
			
		<?php } ?>		


</body>
</html>
