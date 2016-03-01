 
    <div id="content" class="container">
        <div class="row">
           <div class="wrap clearfix contentclass hfeed" role="document"> 
        
             <?php if (kadence_display_sidebar()) : ?>   
   <?php if(isset($virtue_premium['sidebar_layout']) && $virtue_premium['sidebar_layout'] == 'onlyleftsidebar') { ?>
              <aside id="leftsidebar" class="leftside <?php echo esc_attr(kadence_sidebar_class()); ?>">
                  <div class="sidebar"> 
                      <?php if(is_active_sidebar('left-sidebar')) { dynamic_sidebar('left-sidebar'); } ?>
                  </div>
                </aside>
               <?php } ?> 
     <?php if(isset($virtue_premium['sidebar_layout']) && $virtue_premium['sidebar_layout'] == 'bothsidebars') { ?>
              <aside id="leftsidebar" class="leftside <?php echo esc_attr(kadence_sidebar_class()); ?>">
                  <div class="sidebar"> 
                      <?php if(is_active_sidebar('left-sidebar')) { dynamic_sidebar('left-sidebar'); } ?>
                  </div>
                </aside>
               <?php } ?>
            <?php endif; ?>   
      <div class="main <?php echo kadence_main_class(); ?>  postlist" role="main">
      <div class="entry-content col-lg-9 col-md-8" itemprop="mainContentOfPage">

<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'virtue'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
        <?php if(function_exists('kad_wp_pagenavi')) { ?>
              <?php kad_wp_pagenavi(); ?>   
            <?php } else { ?>      
              <nav class="post-nav">
                <ul class="pager">
                  <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'virtue')); ?></li>
                  <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'virtue')); ?></li>
                </ul>
              </nav>
            <?php } ?> 
        <?php endif; ?>
    </div>

</div><!-- /.main -->