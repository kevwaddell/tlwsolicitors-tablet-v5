<header class="header" role="banner">	
	<?php 
	$tag_line = get_field('tag_line', 'options');	
	?>

	
	<div class="header-inner">
	
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-xs-2">
					<div class="header-action-btns">
						<button id="nav-btn" class="btn btn-default in-active"><span class="sr-only">Menu</span><i class="fa fa-bars fa-lg"></i></button>
					</div>
				</div>
			
				<div class="col-xs-8">
					<?php if (is_front_page()) { ?>
					<h1 class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					<?php } else { ?>
					<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
					<?php } ?>
				</div>
				
				<div class="col-xs-2">
					<div class="header-action-btns text-right">
						<button id="search-btn" class="btn btn-default"><span class="sr-only">Search</span><i class="fa fa-search fa-lg"></i></button>
					</div>
				</div>
			
			</div>
		
		</div>
	
	</div>
			
</header>
