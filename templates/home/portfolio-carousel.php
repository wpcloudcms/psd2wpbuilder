<?php 
global $virtue_premium;

?>
<div class="home-portfolio home-margin carousel_outerrim home-padding kad-animation" data-animation="fade-in" data-delay="0">
		<?php if(!empty($virtue_premium['portfolio_title'])) {$porttitle = $virtue_premium['portfolio_title']; } else { $porttitle = __('Featured Projects', 'virtue'); } ?>
			<div class="clearfix">
				<h3 class="hometitle">
					<?php echo $porttitle; ?>
				</h3>
			</div>
		
		<?php 
		if(!empty($virtue_premium['home_portfolio_order'])) {$hp_orderby = $virtue_premium['home_portfolio_order'];} else {$hp_orderby = 'menu_order';}
		if($hp_orderby == 'menu_order') {$p_order = 'ASC';} else {$p_order = 'DESC';}
		if(!empty($virtue_premium['home_portfolio_carousel_count'])) {$hp_pcount = $virtue_premium['home_portfolio_carousel_count'];} else {$hp_pcount = '8';}
		if(!empty($virtue_premium['home_portfolio_carousel_speed'])) {$hport_speed = $virtue_premium['home_portfolio_carousel_speed'].'000';} else {$hport_speed = '9000';}
		if(isset($virtue_premium['home_portfolio_carousel_scroll']) && $virtue_premium['home_portfolio_carousel_scroll'] == 'all' ) {$hport_scroll = '';} else {$hport_scroll = '1';}
					if(!empty($virtue_premium['portfolio_type'])) {
							$port_cat = get_term_by ('id',$virtue_premium['portfolio_type'],'portfolio-type');
							$portfolio_category = $port_cat -> slug;
						} else {
							$portfolio_category = '';
						}
					if(isset($virtue_premium['portfolio_show_type'])) {$portfolio_item_types = $virtue_premium['portfolio_show_type'];} else {$portfolio_item_types = 0;}
					if(isset($virtue_premium['portfolio_show_excerpt']) && $virtue_premium['portfolio_show_excerpt'] == 1) {$portfolio_item_excerpt = true;} else {$portfolio_item_excerpt = false;}
					if(!empty($virtue_premium['home_portfolio_carousel_column'])) {$portfolio_column = $virtue_premium['home_portfolio_carousel_column'];} else {$portfolio_column = 3;}
					
					if ($portfolio_column == '2') {
						$itemsize = 'tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
						$slidewidth = 559; $slideheight = 559; $md = 2; $sm = 2; $xs = 1; $ss = 1;
					} else if ($portfolio_column == '3'){
						$itemsize = 'tcol-lg-4 tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
						$slidewidth = 366; $slideheight = 366; $md = 3; $sm = 3; $xs = 2; $ss = 1;
					} else if ($portfolio_column == '6'){ 
						$itemsize = 'tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
						$slidewidth = 240; $slideheight = 240; $md = 6; $sm = 4; $xs = 3; $ss = 2;
					} else if ($portfolio_column == '5'){
						$itemsize = 'tcol-lg-25 tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
						$slidewidth = 240; $slideheight = 240; $md = 5; $sm = 4; $xs = 3; $ss = 2;
					} else {
						$itemsize = 'tcol-lg-3 tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
						$slidewidth = 269; $slideheight = 269; $md = 4; $sm = 3; $xs = 2; $ss = 1;
					} 
		            if(!empty($virtue_premium['home_portfolio_carousel_height'])) {$slideheight = $virtue_premium['home_portfolio_carousel_height'];}
		                ?>

	<div class="home-margin fredcarousel">
		<div id="hport_carouselcontainer" class="rowtight fadein-carousel">
			<div id="portfolio-carousel" class="clearfix caroufedselclass initcaroufedsel" data-carousel-container="#hport_carouselcontainer" data-carousel-transition="700" data-carousel-scroll="<?php echo esc_attr($hport_scroll);?>" data-carousel-auto="true" data-carousel-speed="<?php echo esc_attr($hport_speed);?>" data-carousel-id="hportfolio_carousel" data-carousel-md="<?php echo esc_attr($md);?>" data-carousel-sm="<?php echo esc_attr($sm);?>" data-carousel-xs="<?php echo esc_attr($xs);?>" data-carousel-ss="<?php echo esc_attr($ss);?>">
				<?php 
				$temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query();
				  $wp_query->query(array(
					'orderby' => $hp_orderby,
					'order' => $p_order,
					'post_type' => 'portfolio',
					'portfolio-type'=>$portfolio_category,
					'posts_per_page' => $hp_pcount));
					$count =0;
					?>
					<?php if ( $wp_query ) : 
							 
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<div class="<?php echo esc_attr($itemsize); ?> kad_portfolio_item">
						<div class="grid_item portfolio_item postclass">
					
                        <?php global $post; 
                        $postsummery = get_post_meta( $post->ID, '_kad_post_summery', true );
						if ($postsummery == 'slider') { ?>
                           	<div class="flexslider kt-flexslider imghoverclass clearfix" data-flex-speed="7000" data-flex-initdelay="<?php echo (rand(10,2000));?>" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
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
												?>
												<li>
													<a href="<?php the_permalink() ?>" class="kad_portfolio_link" alt="<?php the_title(); ?>">
														<img src="<?php echo esc_url($image); ?>" width="<?php echo esc_attr($slidewidth);?>" height="<?php echo esc_attr($slideheight);?>"/>
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
												$image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
													if(empty($image)) {$image = $attachment_url;}
												?>
												<li>
													<a href="<?php the_permalink() ?>" class="kad_portfolio_link" alt="<?php the_title(); ?>">
														<img src="<?php echo esc_url($image); ?>" width="<?php echo esc_attr($slidewidth);?>" height="<?php echo esc_attr($slideheight);?>"/>
													</a>
												</li>
												<?php
											}
                    					}	
								} ?>  
                                                   
					</ul>
              	</div> <!--Flex Slides-->
              <?php } else {
					if (has_post_thumbnail( $post->ID ) ) {
									$image_url = wp_get_attachment_image_src( 
									get_post_thumbnail_id( $post->ID ), 'full' ); 
									$thumbnailURL = $image_url[0]; 
								 	$image = aq_resize($thumbnailURL, $slidewidth, $slideheight, true); 
										if(empty($image)) { $image = $thumbnailURL;} 
									?>

									<div class="imghoverclass">
	                                       <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>" class="kad_portfolio_link">
	                                       <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" width="<?php echo esc_attr($slidewidth);?>" height="<?php echo esc_attr($slideheight);?>" class="lightboxhover" style="display: block;">
	                                       </a> 
	                                </div>
                           				<?php $image = null; $thumbnailURL = null;?>
                           <?php } } ?>
              	<a href="<?php the_permalink() ?>" class="portfoliolink">
              		<div class="piteminfo">   
                          	<h5><?php the_title();?></h5>
                           	<?php if($portfolio_item_types == 1) { $terms = get_the_terms( $post->ID, 'portfolio-type' ); if ($terms) {?> <p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> <?php } } ?>
                    		<?php if($portfolio_item_excerpt == true) {?> <p><?php echo virtue_excerpt(16); ?></p> <?php } ?>
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
            <a id="prevport-hportfolio_carousel" class="prev_carousel icon-arrow-left" href="#"></a>
			<a id="nextport-hportfolio_carousel" class="next_carousel icon-arrow-right" href="#"></a>
	</div> <!-- fred Carousel-->
</div> <!--featclass -->			