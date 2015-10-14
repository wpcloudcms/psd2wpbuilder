            <?php global $post, $virtue_premium; $postsummery = get_post_meta( $post->ID, '_kad_post_summery', true );
            if(empty($postsummery) || $postsummery == 'default') {
                  if(!empty($virtue_premium['post_summery_default'])) {
                            $postsummery = $virtue_premium['post_summery_default'];
                            } else {
                              $postsummery = 'img_portrait';
                            }
                          }
                        if($postsummery == 'img_landscape') { ?>
                          <div id="post-<?php the_ID(); ?>" class="blog_item kt_item_fade_in kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                            <?php if (has_post_thumbnail( $post->ID ) ) {
                              $image_url = wp_get_attachment_image_src( 
                              get_post_thumbnail_id( $post->ID ), 'full' ); 
                              $thumbnailURL = $image_url[0];
                              $image = aq_resize($thumbnailURL, 364, false);
                              if(empty($image)) { $image = $thumbnailURL; }
                              ?>
                                  <div class="imghoverclass img-margin-center">
                                    <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                                      <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="iconhover" style="display:block;">
                                    </a> 
                                  </div>
                              <?php $image = null; $thumbnailURL = null; 
                              } else {
                               $thumbnailURL = virtue_post_default_placeholder();
                                   $image = aq_resize($thumbnailURL, 364, false);
                                  if(empty($image)) { $image = $thumbnailURL; } ?>
                                 <div class="imghoverclass img-margin-center">
                                    <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                                      <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="iconhover" style="display:block;">
                                    </a> 
                                  </div>
                             <?php  } ?>

                      <?php } elseif($postsummery == 'img_portrait') { ?>
                          <div id="post-<?php the_ID(); ?>" class="blog_item kt_item_fade_in kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                            <?php if (has_post_thumbnail( $post->ID ) ) {
                            $image_url = wp_get_attachment_image_src( 
                            get_post_thumbnail_id( $post->ID ), 'full' ); 
                            $thumbnailURL = $image_url[0]; 
                            $image = aq_resize($thumbnailURL, 364, false);
                            if(empty($image)) { $image = $thumbnailURL; } ?>
                                <div class="imghoverclass img-margin-center">
                                    <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="iconhover" style="display:block;">
                                    </a> 
                                 </div>
                            <?php $image = null; $thumbnailURL = null;
                             } else {
                               $thumbnailURL = virtue_post_default_placeholder();
                                   $image = aq_resize($thumbnailURL, 364, false);
                                  if(empty($image)) { $image = $thumbnailURL; } ?>
                                  <div class="imghoverclass img-margin-center">
                                    <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="iconhover" style="display:block;">
                                    </a> 
                                 </div>
                             <?php  } ?>

                      <?php } elseif($postsummery == 'slider_landscape') {?>
                          <div id="post-<?php the_ID(); ?>" class="blog_item kt_item_fade_in kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                                <div class="flexslider loading kt-flexslider" style="max-width:364px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                                    <ul class="slides">
                                      <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                            if(!empty($image_gallery)) {
                                              $attachments = array_filter( explode( ',', $image_gallery ) );
                                                if ($attachments) {
                                                foreach ($attachments as $attachment) {
                                                  $attachment_url = wp_get_attachment_url($attachment , 'full');
                                                  $image = aq_resize($attachment_url, 364, 364, true);
                                                    if(empty($image)) {$image = $attachment_url;} ?>
                                                    <li>
                                                      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
                                                        <img src="<?php echo $image ?>" class="" />
                                                      </a>
                                                    </li>
                                                <?php 
                                                }
                                              }
                                            } else {
                                              $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                                              $attachments = get_posts($attach_args);
                                                if ($attachments) {
                                                  foreach ($attachments as $attachment) {
                                                    $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
                                                    $image = aq_resize($attachment_url, 364, 364, true);
                                                      if(empty($image)) {$image = $attachment_url;} ?>
                                                    <li>
                                                      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
                                                        <img src="<?php echo $image ?>" class="" />
                                                      </a>
                                                    </li>
                                                <?php 
                                                  }
                                                } 
                                            } ?>                                   
                                    </ul>
                                </div> <!--Flex Slides-->
                    <?php } elseif($postsummery == 'slider_portrait') { ?>
                          <div id="post-<?php the_ID(); ?>" class="blog_item kt_item_fade_in kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                                  <div class="flexslider kt-flexslider loading" style="max-width:364px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                                      <ul class="slides">
                                         <?php global $post;
                                        $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                            if(!empty($image_gallery)) {
                                              $attachments = array_filter( explode( ',', $image_gallery ) );
                                                if ($attachments) {
                                                foreach ($attachments as $attachment) {
                                                  $attachment_url = wp_get_attachment_url($attachment , 'full');
                                                  $image = aq_resize($attachment_url, 364, 364, true);
                                                    if(empty($image)) {$image = $attachment_url;} ?>
                                                    <li>
                                                      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
                                                        <img src="<?php echo $image ?>" class="" />
                                                      </a>
                                                    </li>
                                                <?php 
                                                }
                                              }
                                            } else {
                                              $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                                              $attachments = get_posts($attach_args);
                                                if ($attachments) {
                                                  foreach ($attachments as $attachment) {
                                                    $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
                                                    $image = aq_resize($attachment_url, 364, 364, true);
                                                      if(empty($image)) {$image = $attachment_url;} ?>
                                                    <li>
                                                      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
                                                        <img src="<?php echo $image ?>" class="" />
                                                      </a>
                                                    </li>
                                                <?php 
                                                  }
                                                } 
                                            } ?>           
                                      </ul>
                                </div> <!--Flex Slides-->
                    <?php } elseif($postsummery == 'video') {?>
                          <div id="post-<?php the_ID(); ?>" class="blog_item kt_item_fade_in kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                                <div class="videofit">
                                    <?php global $post; echo get_post_meta( $post->ID, '_kad_post_video', true );?>
                                </div>

                    <?php } else {?>
                          <div id="post-<?php the_ID(); ?>" class="blog_item kt_item_fade_in kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                        <?php }?>

                      <div class="postcontent">
                          <header>
                              <a href="<?php the_permalink() ?>"><h5 class="entry-title" itemprop="name headline"><?php the_title(); ?></h5></a>
                                <div class="subhead color_gray">
                                  <span class="postauthortop" rel="tooltip" data-placement="top" data-original-title="<?php echo get_the_author() ?>">
                                    <i class="icon-user"></i>
                                  </span>
                                  <span class="kad-hidepostauthortop"> | </span>
                                    <?php $post_category = get_the_category($post->ID); if (!empty($post_category)) { ?> 
                                    <span class="postedintop" rel="tooltip" data-placement="top" data-original-title="<?php 
                                      foreach ($post_category as $category)  { 
                                        echo $category->name .'&nbsp;'; 
                                      } ?>"><i class="icon-folder"></i></span>
                                     <?php }?>
                                     <?php if(comments_open() || (get_comments_number() != 0) ) { ?>
                                  <span class="kad-hidepostedin">|</span>
                                <span class="postcommentscount" rel="tooltip" data-placement="top" data-original-title="<?php echo esc_attr(get_comments_number()); ?>">
                                  <i class="icon-bubbles"></i>
                                </span>
                                <?php }?>
                                <span class="postdatetooltip">|</span>
                                 <span style="margin-left:3px;" class="postdatetooltip" rel="tooltip" data-placement="top" data-original-title="<?php echo get_the_date(); ?>">
                                  <i class="icon-calendar"></i>
                                </span>
                              </div>   
                          </header>
                          <div class="entry-content" itemprop="articleBody">
                              <?php the_excerpt(); ?>
                          </div>
                          <footer>
                              <?php $tags = get_the_tags(); if ($tags) { ?> <span class="posttags color_gray"><i class="icon-tag"></i> <?php the_tags('', ', ', ''); ?> </span><?php } ?>
                          </footer>
                        </div><!-- Text size -->
              </div> <!-- Blog Item -->