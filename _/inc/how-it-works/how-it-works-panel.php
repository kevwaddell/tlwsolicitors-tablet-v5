<?php foreach ($processes as $panel) { ?>

<div id="<?php echo ($process_counter == 0) ? 'start': 'slide'.$process_counter ; ?>" class="step"<?php echo ($panel['hiw_data_x']) ? ' data-x="'.$panel['hiw_data_x'].'"': ''; ?><?php echo ($panel['hiw_data_y']) ? ' data-y="'.$panel['hiw_data_y'].'"': ''; ?>>
	<button class="close-how-it-works"><span class="sr-only">Close</span><i class="fa fa-times fa-2x"></i></button>
	<?php if ($panel['icon']) { ?>
	<div class="icon"><i class="fa <?php echo $panel['icon']; ?> fa-4x"></i></div>
	<?php } ?>
	
	<?php if ($panel['hiw-back-link']) { ?>
	<a href="<?php echo $panel['hiw-back-link']; ?>" class="back-link"><i class="fa fa-arrow-circle-up fa-lg"></i></a>
	<?php } ?>
	
    <p class="header"><?php echo $panel['title']; ?></p>
    <p class="text"><?php echo $panel['hiw_text']; ?></p>
    
    <?php if ($panel['hiw_links'] == 1 && $process_counter < ($process_total-1) ) { ?>
	<a href="#slide<?php echo $panel['hiw_link_1_target'] ; ?>" class="step-link link-mid">
		<span>
			<?php if ($panel['hiw_link_1_icon']) { ?>
	   		<i class="fa <?php echo $panel['hiw_link_1_icon']; ?> fa-lg"></i>
	   		<?php } ?>
	   		<?php echo $panel['hiw_link_1_label'] ; ?>
	   	</span>
	 </a>
    <?php } ?>
     <?php if ($panel['hiw_links'] == 2 && $process_counter < ($process_total-1) ) { ?>
    <a href="#slide<?php echo $panel['hiw_link_1_target'] ; ?>" class="step-link link-left">
		<span>
			<?php if ($panel['hiw_link_1_icon']) { ?>
	   		<i class="fa <?php echo $panel['hiw_link_1_icon']; ?> fa-lg"></i>
	   		<?php } ?>
	   		<?php echo $panel['hiw_link_1_label'] ; ?>
	   	</span>
	 </a>
    <a href="#slide<?php echo $panel['hiw_link_2_target'] ; ?>" class="step-link link-right">
	    <span>
	    <?php if ($panel['hiw_link_2_icon']) { ?>
	    	<i class="fa <?php echo $panel['hiw_link_2_icon']; ?> fa-lg"></i>
	    	<?php } ?>
			<?php echo $panel['hiw_link_2_label'] ; ?>
	    </span>
	</a>
    <?php } ?>
    <?php if (($process_counter + 1) == $process_total ) { ?>
    <a id="end-slide-link" href="#" class="end-link link-mid link-enquiry">
	    <span>
	    	<?php if ($panel['hiw_link_1_icon']) { ?>
	   		<i class="fa <?php echo $panel['hiw_link_1_icon']; ?> fa-lg"></i>
	   		<?php } ?>
			<?php echo $panel['hiw_link_1_label'] ; ?>
	    </span>
	</a>
    <?php } ?>
</div>

<?php 
$process_counter++;
} ?>
