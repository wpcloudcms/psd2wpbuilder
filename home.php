  
  <?php $homeid = get_option( 'page_for_posts' );
  if(get_post_meta( $homeid, '_kad_blog_summery', true ) == 'full') {
    $summary    = 'full'; 
    $postclass  = "single-article fullpost";
  } else {
    $summary    = 'normal';
    $postclass  = 'postlist';
  } ?>

    <div id="content">
      <div class="row">
              <div class="wrap clearfix contentclass hfeed" role="document"> 
        
             <?php if (kadence_display_sidebar()) : ?>   
   <?php if(isset($virtue_premium['sidebar_layout']) && $virtue_premium['sidebar_layout'] == 'onlyleftsidebar') { ?>
              <aside id="leftsidebar" class="leftside col-md-3"> <?php 
                if(is_active_sidebar('left-sidebar')) { dynamic_sidebar('left-sidebar'); } ?>
              </aside>
               <?php } ?> 
     <?php if(isset($virtue_premium['sidebar_layout']) && $virtue_premium['sidebar_layout'] == 'bothsidebars') { ?>
              <aside id="leftsidebar" class="leftside col-md-3"> <?php 
                if(is_active_sidebar('left-sidebar')) { dynamic_sidebar('left-sidebar'); } ?>
              </aside>
               <?php } ?>
            <?php endif; ?>
      <div class="main <?php echo kadence_main_class(); ?>  <?php echo esc_attr($postclass) .' '. esc_attr($fullclass); ?>" role="main">

<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'virtue'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php if($summary == 'full'){
                      while (have_posts()) : the_post(); 
                          get_template_part('templates/content', 'fullpost'); 
                      endwhile; 
            } else {
                      while (have_posts()) : the_post(); 
                          get_template_part('templates/content', get_post_format());
                      endwhile; 
            } ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
              <?php kad_wp_pagenavi(); ?>  
        <?php endif; ?>
</div><!-- /.main -->
