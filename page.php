    
    <div id="content" class="col-sm-12">
   		<div class="row">
	      	<div class="main <?php echo esc_attr(kadence_main_class()); ?>" id="ktmain" role="main">
	      		<div class="entry-content" itemprop="mainContentOfPage">
					<?php get_template_part('templates/content', 'page'); ?>
				</div>
				<?php global $virtue_premium; 
				if(isset($virtue_premium['page_comments']) && $virtue_premium['page_comments'] == '1') {
					comments_template('/templates/comments.php');
				} ?>
			</div><!-- /.main -->