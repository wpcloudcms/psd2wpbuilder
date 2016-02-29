<?php 
	global $virtue_premium;

 if(!empty($virtue_premium['portfolio_full_title'])) {
 	$port_full_title = $virtue_premium['portfolio_full_title']; 
 } else { 
 	$port_full_title = '';
 } ?>

	<div class="home-portfolio clearfix home-margin home-padding">
		<div class="clearfix">
			<h3 class="hometitle">
				<?php echo $port_full_title; ?>
			</h3>
		</div>

		<?php if(!empty($virtue_premium['home_portfolio_full_order'])) {
				$hp_orderby = $virtue_premium['home_portfolio_full_order'];
			} else {
				$hp_orderby = 'menu_order';
			}
			if($hp_orderby == 'menu_order') {
				$p_order = 'ASC';
			} else {
				$p_order = 'DESC';
			}
			$portfolio_item_full_types = $virtue_premium['portfolio_full_show_type'];
			if(isset($virtue_premium['portfolio_full_show_excerpt']) && $virtue_premium['portfolio_full_show_excerpt'] == 1) {
				$portfolio_item_excerpt = true;
			} else {
				$portfolio_item_excerpt = false;
			}
			if(isset($virtue_premium['home_port_count'])) {
				$portfolio_item_count = $virtue_premium['home_port_count'];
			} else {
				$portfolio_item_count = '8';
			}
			if(isset($virtue_premium['home_port_columns'])) {
				$portfolio_column = $virtue_premium['home_port_columns'];
			} else {
				$portfolio_column = '4';
			}
			if(!empty($virtue_premium['portfolio_full_type'])) {
				$port_cat = get_term_by ('id',$virtue_premium['portfolio_full_type'],'portfolio-type');
				$portfolio_cat_slug = $port_cat -> slug;
			} else {
				$portfolio_cat_slug = '';
			}
			if ($portfolio_column == '2') {
				$itemsize = 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
				$slidewidth = 559; $slideheight = 559;
			} else if ($portfolio_column == '3'){ 
				$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
				$slidewidth = 366; $slideheight = 366;
			} else if ($portfolio_column == '6'){ 
				$itemsize = 'tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
				$slidewidth = 240; $slideheight = 240;
			} else if ($portfolio_column == '5'){
				$itemsize = 'tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
				$slidewidth = 240; $slideheight = 240; 
			} else {
				$itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
				$slidewidth = 269; $slideheight = 269; 
			}
		    if(!empty($virtue_premium['home_portfolio_full_height'])) {$slideheight = $virtue_premium['home_portfolio_full_height'];}
		    if(isset($virtue_premium['portfolio_full_masonry']) && $virtue_premium['portfolio_full_masonry'] == 1) {$slideheight = null;}
		    if(!empty($virtue_premium['home_portfolio_lightbox']) && $virtue_premium['home_portfolio_lightbox'] == 1) {$plb = true;} else {$plb = false;}
		    if(isset($virtue_premium['virtue_animate_in']) && $virtue_premium['virtue_animate_in'] == 1) {$animate = 1;} else {$animate = 0;}

			if(isset($virtue_premium['portfolio_full_show_filter']) && $virtue_premium['portfolio_full_show_filter'] == 1) { ?>
      			<section id="options" class="clearfix">
				<?php if(!empty($virtue_premium['filter_all_text'])) {$alltext = $virtue_premium['filter_all_text'];} else {$alltext = __('All', 'virtue');}
					if(!empty($virtue_premium['portfolio_filter_text'])) {$portfoliofiltertext = $virtue_premium['portfolio_filter_text'];} else {$portfoliofiltertext = __('Filter Projects', 'virtue');}
					$termtypes = array( 'child_of' => $virtue_premium['portfolio_full_type'],);
					$categories= get_terms('portfolio-type', $termtypes);
					$count = count($categories);
						echo '<a class="filter-trigger headerfont" data-toggle="collapse" data-target=".filter-collapse"><i class="icon-tags"></i> '.$portfoliofiltertext.'</a>';
						echo '<ul id="filters" class="clearfix option-set filter-collapse">';
						echo '<li class="postclass"><a href="#" data-filter="*" title="All" class="selected"><h5>'.$alltext.'</h5><div class="arrow-up"></div></a></li>';
						 if ( $count > 0 ){
							foreach ($categories as $category){ 
							$termname = strtolower($category->slug);
							$termname = preg_replace("/[^a-zA-Z 0-9]+/", " ", $termname);
							$termname = str_replace(' ', '-', $termname);
							echo '<li class="postclass"><a href="#" data-filter=".'.esc_attr($termname).'" title="" rel="'.esc_attr($termname).'"><h5>'.$category->name.'</h5><div class="arrow-up"></div></a></li>';
								}
				 		}
				 		echo "</ul>"; ?>
				</section>
            <?php } ?>

            <div id="portfoliowrapper" class="rowtight init-isotope" data-fade-in="<?php echo esc_attr($animate);?>" data-iso-style="masonry" data-iso-selector=".p-item" data-iso-filter="true"> 
            <?php $temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query();
				  $wp_query->query(array(
					'orderby' => $hp_orderby,
					'order' => $p_order,
					'post_type' => 'portfolio',
					'portfolio-type'=>$portfolio_cat_slug,
					'posts_per_page' => $portfolio_item_count));
					
					if ( $wp_query ) :  
						while ( $wp_query->have_posts() ) : $wp_query->the_post();

						$terms = get_the_terms( $post->ID, 'portfolio-type' );
						if ( $terms && ! is_wp_error( $terms ) ) : 
							$links = array();
								foreach ( $terms as $term ) { $links[] = $term->slug;}
							$links = preg_replace("/[^a-zA-Z 0-9]+/", " ", $links);
							$links = str_replace(' ', '-', $links);	
							$tax = join( " ", $links );		
						else :	
							$tax = '';	
						endif;
						?>
                 
					<div class="<?php echo esc_attr($itemsize);?> all <?php echo strtolower($tax); ?>  p-item">
                	<div class="grid_item portfolio_item kad_portfolio_fade_in kt_item_fade_in kad-light-gallery postclass">
					
                        <?php global $post; 
                        $postsummery = get_post_meta( $post->ID, '_kad_post_summery', true );
						if ($postsummery == 'slider') { ?>
                           <div class="flexslider kt-flexslider loading imghoverclass clearfix" data-flex-speed="7000" data-flex-initdelay="<?php echo (rand(10,2000));?>" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                       			<ul class="slides">
                       			<?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                          		if(!empty($image_gallery)) {
                    				$attachments = array_filter( explode( ',', $image_gallery ) );
                    					if ($attachments) {
											foreach ($attachments as $attachment) {
												$attachment_url = wp_get_attachment_url($attachment , 'full');
												$image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
												if(empty($image)) {$image = $attachment_url;}
												?>
												<li>
													<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
														<img src="<?php echo esc_url($image); ?>"/>
													</a>
													<?php if($plb) {?>
														<a href="<?php echo esc_url($attachment_url); ?>" class="kad_portfolio_lightbox_link" title="<?php the_title();?>" data-rel="lightbox">
															<i class="icon-search"></i>
														</a>
													<?php }?>
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
												if(empty($image)) {$image = $attachment_url;} ?>
												<li>
													<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
														<img src="<?php echo esc_url($image); ?>"/>
													</a>
													<?php if($plb) {?>
														<a href="<?php echo esc_url($attachment_url); ?>" class="kad_portfolio_lightbox_link" title="<?php the_title();?>" data-rel="lightbox">
															<i class="icon-search"></i>
														</a>
													<?php }?>
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
									if(empty($image)) {$image = $thumbnailURL;} ?>
									<div class="imghoverclass">
	                                       <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
	                                       	<img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="lightboxhover" style="display: block;">
	                                       </a> 
	                                </div>
		                                 <?php if($plb) {?>
		                                 	<a href="<?php echo esc_url($thumbnailURL); ?>" class="kad_portfolio_lightbox_link" title="<?php the_title();?>" rel="lightbox">
		                                 		<i class="icon-search"></i>
		                                 	</a>
		                                 <?php }?>
                           			<?php $image = null; $thumbnailURL = null;?>
                           		<?php } 
                           	} ?>
			              	<a href="<?php the_permalink() ?>" class="portfoliolink">
			              		<div class="piteminfo">   
			                          	<h5><?php the_title();?></h5>
			                           	<?php if($portfolio_item_full_types == 1) { $terms = get_the_terms( $post->ID, 'portfolio-type' ); if ($terms) {?> <p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> <?php } } ?>
			                    		<?php if($portfolio_item_excerpt == true) {?> <p><?php echo virtue_excerpt(16); ?></p> <?php } ?>
			                    </div>
			                </a>
                		</div>
            			</div>
                    
						<?php endwhile; else: ?>
					 
							<li class="error-not-found"><?php _e('Sorry, no portfolio entries found.', 'virtue');?></li>
						
				<?php endif; ?>
                </div> <!--portfoliowrapper-->
                                   
                    <?php 
                      $wp_query = null; 
                      $wp_query = $temp;  // Reset
                    ?>
                    <?php wp_reset_query(); ?>
</div><!-- /.homepadding -->