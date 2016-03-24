<?php
/*
Template Name: Fullwidth Ajax Page
*/
?>
	<div id="pageheader" class="titleclass">
		<div class="col-sm-12">
			<?php //get_template_part('templates/page', 'header'); ?>
		</div><!--container-->
	</div><!--titleclass-->
	
        <div id="content">
     <div class="container">
   		<div class="row">    
            <div class="wrap clearfix contentclass hfeed" role="document"> 
     		<div class="main <?php echo kadence_main_class(); ?>" id="ktmain" role="main">
				<div id="ajaxpage" class="entry-content" itemprop="mainContentOfPage">
					<?php get_template_part('templates/content', 'page'); ?>
				</div>
	</div><!-- /.main -->