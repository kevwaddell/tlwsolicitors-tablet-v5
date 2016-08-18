
<?php if (is_home() || is_archive() || is_single()) { ?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">	
		
		<input type="hidden" name="post_type" value="post" />
		
		<span class="input-group-btn">
		<input type="submit" id="searchsubmit" value="&#xf002;" class="search-submit btn btn-default" />
		</span>
		
		<input type="search" value="<?php the_search_query(); ?>" placeholder="Search…" class="search-query form-control" name="s" id="s" />
  	
  	</div>
</form>

<?php } else { ?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <label class="sr-only" for="s">Search</label>
  <input type="search" value="<?php the_search_query(); ?>" placeholder="Search…" class="form-control search-query" name="s" id="s" />
  
  <div class="search-btn-wrap">
  	<input type="submit" id="searchsubmit" value="Start search" class="search-submit" /><i class="fa fa-angle-right fa-lg btn-pointer"></i>
  </div>
</form>	
	
<?php } ?>