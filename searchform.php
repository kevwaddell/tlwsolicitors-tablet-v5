<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  
  <?php if (is_home() || is_archive() || is_single()) { ?>
 <input type="hidden" name="post_type" value="post" />
  <?php } ?>
  
  <label class="sr-only" for="s">Search</label>
  <input type="search" value="<?php the_search_query(); ?>" placeholder="Search…" class="form-control search-query" name="s" id="s" />
  
  <div class="search-btn-wrap">
  	<input type="submit" id="searchsubmit" value="Start search" class="search-submit" /><i class="fa fa-angle-right fa-lg btn-pointer"></i>
  </div>
</form>	
