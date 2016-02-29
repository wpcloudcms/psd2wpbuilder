<div id="portfolio_carousel_container" class="carousel_outerrim">
        <?php global $post, $virtue_premium; 
        $titletext 	= get_post_meta( $post->ID, '_kad_portfolio_carousel_title', true );  
        $bporder 	= get_post_meta( $post->ID, '_kad_portfolio_carousel_order', true );
        $bpgroup 	= get_post_meta( $post->ID, '_kad_portfolio_carousel_group', true );
        if(isset($bporder)) {
        	$bp_orderby = $bporder;
        } else {
        	$bp_orderby = 'menu_order';
        }
		if($bp_orderby == 'menu_order' || $bp_orderby == 'title') {
			$bp_order = 'ASC';
		} else {
			$bp_order = 'DESC';
		}
		if(!empty($bpgroup) && $bpgroup == 'cat') {
			$typeterms =  wp_get_post_terms( $post->ID, 'portfolio-type', array( 'orderby' => 'parent', 'order' => 'ASC' ));
			$typeterm = $typeterms[0]; 
			$bp_cat_slug = $typeterm->slug; 
		} else {
			$bp_cat_slug = '';
		} 
		if(!empty($titletext)) {
			echo '<h3 class="title">'.esc_html($titletext).'</h3>'; 
		} else {
			echo '<h3 class="title">'.__('Recent Projects', 'virtue').'</h3>';
		} ?> 
        <div class="portfolio-carouselcase fredcarousel">
            <?php 	if(!empty($virtue_premium['portfolio_recent_car_column'])) {
            			$portfolio_column = $virtue_premium['portfolio_recent_car_column'];
            		} else {
            			$portfolio_column = 4;
            		}
            		if(!empty($virtue_premium['portfolio_recent_car_items'])) {
            			$portfolio_items = $virtue_premium['portfolio_recent_car_items'];
            		} else {
            			$portfolio_items = 8;
            		}
            		if(!empty($virtue_premium['portfolio_recent_carousel_speed'])) {
            			$bport_speed = $virtue_premium['portfolio_recent_carousel_speed'].'000';
            		} else {
            			$bport_speed = '9000';
            		}
					if(isset($virtue_premium['portfolio_recent_carousel_scroll']) && $virtue_premium['portfolio_recent_carousel_scroll'] == 'all' ) {
						$bport_scroll = 'null';
					} else {
						$bport_scroll = '1';
					}
            		if ($portfolio_column == '2') {
            			$itemsize 		= 'tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12';
            			$slidewidth 	= 559;
            			$slideheight 	= 559;
            			$md 			= 2;
            			$sm 			= 2;
            			$xs 			= 1;
            			$ss 			= 1;
            		} else if ($portfolio_column == '3'){
            			$itemsize 		= 'tcol-lg-4 tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12';
            			$slidewidth 	= 366;
            			$slideheight 	= 366;
            			$md 			= 3;
            			$sm 			= 3;
            			$xs 			= 2;
            			$ss 			= 1;
            		} else if ($portfolio_column == '6'){
            			$itemsize 		= 'tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6';
            			$slidewidth 	= 240;
            			$slideheight 	= 240;
            			$md 			= 6;
            			$sm 			= 4;
            			$xs 			= 3;
            			$ss 			= 2;
            		} else if ($portfolio_column == '5'){
            			$itemsize 		= 'tcol-lg-25 tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6';
            			$slidewidth 	= 240;
            			$slideheight 	= 240;
            			$md 			= 5;
            			$sm 			= 4;
            			$xs 			= 3;
            			$ss 			= 2;
            		} else {
            			$itemsize 		= 'tcol-lg-3 tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12';
            			$slidewidth 	= 269;
            			$slideheight 	= 269;
            			$md 			= 4;
            			$sm 			= 3;
            			$xs 			= 2;
            			$ss 			= 1;
            		} ?>
				<div id="carouselcontainer-portfolio" class="rowtight fadein-carousel">
            	<div id="portfolio-carousel" class="clearfix caroufedselclass initcaroufedsel" data-carousel-container="#carouselcontainer-portfolio" data-carousel-transition="300" data-carousel-scroll="<?php echo esc_attr($bport_scroll);?>" data-carousel-auto="true" data-carousel-speed="<?php echo esc_attr($bport_speed);?>" data-carousel-id="portfolio" data-carousel-md="<?php echo esc_attr($md);?>" data-carousel-sm="<?php echo esc_attr($sm);?>" data-carousel-xs="<?php echo esc_attr($xs);?>" data-carousel-ss="<?php echo esc_attr($ss);?>">
                 <?php  $temp = $wp_query; 
				  		$wp_query = null; 
				  		$wp_query = new WP_Query();
						$wp_query->query(array(
							'orderby' 		=> $bp_orderby,
							'order' 		=> $bp_order,
							'post_type' 	=> 'portfolio',
							'portfolio-type'=> $bp_cat_slug,
							'post__not_in' 	=> array($post->ID),
							'posts_per_page'=> $portfolio_items,
							)
						);
						if ( $wp_query ) : 
							while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div class="<?php echo esc_attr($itemsize); ?> kad_portfolio_item">
							<div class="grid_item portfolio_item all postclass">
		                        <?php global $post;
		                        $postsummery = get_post_meta( $post->ID, '_kad_post_summery', true );
								if ($postsummery == 'slider') { ?>
		                        <div class="flexslider kt-flexslider loading imghoverclass clearfix" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
		                       		<ul class="slides ">
		                          	<?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
			                          if(!empty($image_gallery)) {
			                            $attachments = array_filter( explode( ',', $image_gallery ) );
			                              if ($attachments) {
			                              foreach ($attachments as $attachment) {
			                                $attachment_url = wp_get_attachment_url($attachment , 'full');
			                                $image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
			                                  if(empty($image)) {$image = $attachment_url;}?>
			                                  <li><a href="<?php the_permalink() ?>" class="kad_portfolio_link" alt="<?php the_title(); ?>"><img src="<?php echo esc_url($image); ?>" class="" /></a></li>
			                                <?php }
			                            }
			                          } else {
			                            $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
			                            $attachments = get_posts($attach_args);
			                              if ($attachments) {
			                                foreach ($attachments as $attachment) {
			                                  $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
			                                  $image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
			                                    if(empty($image)) {$image = $attachment_url;} ?>
			                                  <li><a href="<?php the_permalink() ?>" class="kad_portfolio_link" alt="<?php the_title(); ?>"><img src="<?php echo esc_url($image); ?>" class="" /></a></li>
			                                <?php }
			                              } 
			                          }  ?>                   
									</ul>
		              			</div> <!--Flex Slides-->
              			<?php } else {
								if (has_post_thumbnail( $post->ID ) ) {
									$image_url = wp_get_attachment_image_src( 
									get_post_thumbnail_id( $post->ID ), 'full' ); 
									$thumbnailURL = $image_url[0]; 
									$image = aq_resize($thumbnailURL, $slidewidth, $slideheight, true);
									if(empty($image)) {$image = $thumbnailURL;} ?>
									<div class="imghoverclass">
	                                       <a href="<?php the_permalink()  ?>" alt="<?php the_title(); ?>" class="kad_portfolio_link">
	                                       	<img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="lightboxhover" style="display: block;">
	                                       </a> 
	                                </div>
                           				<?php $image = null; $thumbnailURL = null;?>
                           <?php } } ?>
              	<a href="<?php the_permalink() ?>" class="portfoliolink">
              		<div class="piteminfo">   
                          <h5><?php the_title();?></h5>
                         </div>
                </a>
                </div>
            </div>
					<?php endwhile; else: ?>
					 
					<li class="error-not-found"><?php _e('Sorry, no portfolio entries found.', 'virtue');?></li>
						
				<?php endif; ?>	
                <?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
                    <?php wp_reset_query(); ?>
													
			</div>
		</div>
     <div class="clearfix"></div>
            <a id="prevport-portfolio" class="prev_carousel icon-arrow-left" href="#"></a>
			<a id="nextport-portfolio" class="next_carousel icon-arrow-right" href="#"></a>
            </div>
</div><!-- Porfolio Container-->				