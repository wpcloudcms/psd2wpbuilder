  <?php if(kadence_display_sidebar()) {$slide_sidebar = 848;} else {$slide_sidebar = 1140;}
  global $post, $virtue_premium; $headcontent = get_post_meta( $post->ID, '_kad_blog_head', true );
    if(empty($headcontent) || $headcontent == 'default') {
        if(!empty($virtue_premium['post_head_default'])) {
            $headcontent = $virtue_premium['post_head_default'];
        } else {
            $headcontent = 'none';
        }
    }
   $height = get_post_meta( $post->ID, '_kad_posthead_height', true ); if (!empty($height)) $slideheight = $height; else $slideheight = 400; 
    $swidth = get_post_meta( $post->ID, '_kad_posthead_width', true ); if (!empty($swidth)) $slidewidth = $swidth; else $slidewidth = $slide_sidebar; 
     if ($headcontent == 'carousel') { ?>
        <section class="postfeat carousel_outerrim loading">
            <div id="post-carousel-gallery" class="fredcarousel fadein-carousel" style="overflow:hidden; height: <?php echo esc_attr($slideheight);?>px">
                <div class="gallery-carousel kad-light-wp-gallery initimagecarousel" data-carousel-container="#post-carousel-gallery" data-carousel-transition="300" data-carousel-auto="true" data-carousel-speed="7000" data-carousel-id="postimgcarousel">
                  <?php
                      $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                          if(!empty($image_gallery)) {
                            $attachments = array_filter( explode( ',', $image_gallery ) );
                              if ($attachments) {
                                foreach ($attachments as $attachment) {
                                      $attachment_url = wp_get_attachment_url($attachment , 'full');
                                $image = aq_resize($attachment_url, null, $slideheight, false, false);
                                   if(empty($image)) {
                                    $image = array();
                                    $image[0] = $attachment_url;
                                    $image[1] = 400;
                                    $image[2] = $slideheight;
                                  }
                                  echo '<div class="carousel_gallery_item" style="float:left; margin: 0 5px; width:'.esc_attr($image[1]).'px; height:'.esc_attr($image[2]).'px;">';
                                  echo '<a href="'.esc_url($attachment_url).'" data-rel="lightbox">';
                                  echo '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_post_field('post_excerpt', $attachment)).'"/>';
                                  echo '</a></div>';
                                }
                              }
                          } else {
                            $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                            $attachments = get_posts($attach_args);
                              if ($attachments) {
                                foreach ($attachments as $attachment) {
                                  $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
                                  $image = aq_resize($attachment_url, null, $slideheight, false, false);
                                     if(empty($image)) {
                                    $image = array();
                                    $image[0] = $attachment_url;
                                    $image[1] = 400;
                                    $image[2] = $slideheight;
                                  }
                                  echo '<div class="carousel_gallery_item" style="float:left; margin: 0 5px; width:'.esc_attr($image[1]).'px; height:'.esc_attr($image[2]).'px;">';
                                  echo '<a href="'.esc_url($attachment_url).'" data-rel="lightbox">';
                                  echo '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_post_field('post_excerpt', $attachment)).'"/>';
                                  echo '</a></div>';
                                }
                              } 
                          } ?>                           
            </div> <!--post gallery carousel-->
            <div class="clearfix"></div>
              <a id="prevport-postimgcarousel" class="prev_carousel icon-arrow-left" href="#"></a>
              <a id="nextport-postimgcarousel" class="next_carousel icon-arrow-right" href="#"></a>
          </div> <!--fredcarousel-->
        </section>
      <?php } ?>
<div id="content" class="container">
    <div class="row single-article" itemscope="" itemtype="http://schema.org/BlogPosting">
      <div class="main <?php echo kadence_main_class(); ?>" id="ktmain" role="main">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class(); ?>>
          <?php if ($headcontent == 'flex') { ?>
              <section class="postfeat">
                <div class="flexslider kad-light-gallery kt-flexslider loading" style="max-width:<?php echo esc_attr($slidewidth);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                <ul class="slides">
                  <?php
                      $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                          if(!empty($image_gallery)) {
                            $attachments = array_filter( explode( ',', $image_gallery ) );
                              if ($attachments) {
                              foreach ($attachments as $attachment) {
                                $attachment_url = wp_get_attachment_url($attachment , 'full');
                                $image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
                                  if(empty($image)) {$image = $attachment_url;}
                                echo '<li><a href="'.$attachment_url.'" rel="lightbox"><img src="'.$image.'"/></a></li>';
                              }
                            }
                          } else {
                            $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                            $attachments = get_posts($attach_args);
                              if ($attachments) {
                                foreach ($attachments as $attachment) {
                                  $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
                                  $image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
                                    if(empty($image)) {$image = $attachment_url;}
                                  echo '<li><a href="'.$attachment_url.'" rel="lightbox"><img src="'.$image.'"/></a></li>';
                                }
                              } 
                          } ?>                            
                  </ul>
                </div> <!--Flex Slides-->
              </section>
        <?php } else if ($headcontent == 'carouselslider') { ?>
        <section class="postfeat">
          <div id="imageslider" class="loading">
            <div class="carousel_slider_outer fredcarousel fadein-carousel" style="overflow:hidden; max-width:<?php echo esc_attr($slidewidth);?>px; height: <?php echo esc_attr($slideheight);?>px; margin-left: auto; margin-right:auto;">
                <div class="carousel_slider kad-light-gallery initcarouselslider" data-carousel-container=".carousel_slider_outer" data-carousel-transition="600" data-carousel-height="<?php echo esc_attr($slideheight); ?>" data-carousel-auto="true" data-carousel-speed="9000" data-carousel-id="carouselslider">
                    <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                          if(!empty($image_gallery)) {
                              $attachments = array_filter( explode( ',', $image_gallery ) );
                                if ($attachments) {
                                  foreach ($attachments as $attachment) {
                                        $attachment_url = wp_get_attachment_url($attachment , 'full');
                                        $image = aq_resize($attachment_url, null, $slideheight, false, false);
                                        $caption = get_post($attachment)->post_excerpt;
                                    if(empty($image)) {$image = array($attachment_url,$slidewidth,$slideheight);} 
                                    echo '<div class="carousel_gallery_item" style="float:left; display: table; position: relative; text-align: center; margin: 0; width:auto; height:'.esc_attr($image[2]).'px;">';
                                    echo '<div class="carousel_gallery_item_inner" style="vertical-align: middle; display: table-cell;">';
                                    echo '<a href="'.esc_url($attachment_url).'" data-rel="lightbox" title="'.esc_attr($caption).'">';
                                    echo '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" />';
                                    echo '</a>'; ?>
                                    </div>
                                  </div>
                          <?php } } }?>
                    </div>
                    <div class="clearfix"></div>
                      <a id="prevport-carouselslider" class="prev_carousel icon-arrow-left" href="#"></a>
                      <a id="nextport-carouselslider" class="next_carousel icon-arrow-right" href="#"></a>
                  </div> 
          </div>   
        </section>
        <?php } else if ($headcontent == 'video') { ?>
            <section class="postfeat">
                <div class="videofit">
                    <?php $video = get_post_meta( $post->ID, '_kad_post_video', true ); echo do_shortcode($video); ?>
                </div>
            </section>
        <?php } else if ($headcontent == 'image') {           
                $thumb = get_post_thumbnail_id();
                $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
                $image = aq_resize( $img_url, $slidewidth, $slideheight, true ); //resize & crop the image
                    if(empty($image)) { $image = $img_url; }
                      if($image) : ?>
                        <div class="imghoverclass post-single-img"><a href="<?php echo esc_url($img_url); ?>" rel="lightbox" class=""><img src="<?php echo esc_url($image); ?>" itemprop="image" alt="<?php the_title(); ?>" /></a></div>
                      <?php endif; ?>
        <?php } ?>
    <?php get_template_part('templates/entry', 'meta-date'); ?>
    <header>
      <?php if(kadence_display_post_breadcrumbs()) { kadence_breadcrumbs(); } ?>
      <h1 class="entry-title" itemprop="name headline"><?php the_title(); ?></h1>
        <?php get_template_part('templates/entry', 'meta-subhead'); ?>
    </header>
    <div class="entry-content clearfix" itemprop="description articleBody">
      <?php the_content(); ?>
    </div>
    <footer class="single-footer">
      <?php $tags = get_the_tags(); if ($tags) { ?> <span class="posttags"><i class="icon-tag"></i> <?php the_tags('', ', ', ''); ?> </span><?php } ?>
      
      <?php $authorbox = get_post_meta( $post->ID, '_kad_blog_author', true );
      if(empty($authorbox) || $authorbox == 'default') { if(isset($virtue_premium['post_author_default']) && ($virtue_premium['post_author_default'] == 'yes')) { virtue_author_box(); }}
        else if($authorbox == 'yes'){ virtue_author_box(); } ?>
      <?php $blog_carousel_recent = get_post_meta( $post->ID, '_kad_blog_carousel_similar', true ); 
      if(empty($blog_carousel_recent) || $blog_carousel_recent == 'default' ) { if(isset($virtue_premium['post_carousel_default'])) {$blog_carousel_recent = $virtue_premium['post_carousel_default']; } }
      if ($blog_carousel_recent == 'similar') { get_template_part('templates/similarblog', 'carousel'); } 
      else if($blog_carousel_recent == 'recent') {get_template_part('templates/recentblog', 'carousel');} ?>

      <?php wp_link_pages(array('before' => '<nav class="pagination kt-pagination">', 'after' => '</nav>', 'link_before'=> '<span>','link_after'=> '</span>')); ?>
      <?php if(isset($virtue_premium['show_postlinks']) &&  $virtue_premium['show_postlinks'] == 1) {get_template_part('templates/entry', 'post-links'); }?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
</div>
