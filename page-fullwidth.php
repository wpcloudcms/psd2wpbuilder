<?php
/*
Template Name: Fullwidth
*/
?>

	<div id="pageheader" class="titleclass">
		<div class="col-sm-12">
			<?php get_template_part('templates/page', 'header'); ?>
		</div><!--container-->
	</div><!--titleclass-->
	
    <div id="content" class="col-sm-12">
   		<div class="row">
     		<div class="main <?php echo bigcloudcms_main_class(); ?>" id="ktmain" role="main">
				<div class="entry-content" itemprop="mainContentOfPage">
					<?php get_template_part('templates/content', 'page'); ?>
				</div>
<?php global $bigcloudcms_premium; if(isset($bigcloudcms_premium['page_comments']) && $bigcloudcms_premium['page_comments'] == '1') { comments_template('/templates/comments.php');} ?>
	</div><!-- /.main -->