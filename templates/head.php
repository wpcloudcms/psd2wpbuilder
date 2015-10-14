<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?> <?php kadence_html_tag_schema();?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?> <?php kadence_html_tag_schema();?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?> <?php kadence_html_tag_schema();?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> <?php kadence_html_tag_schema();?> > <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <?php global $post, $virtue_premium; 
    if(kadence_seo_switch()) {
      if ( get_post_meta( get_the_ID(), '_kad_seo_title', true )) { $title = get_post_meta( get_the_ID(), '_kad_seo_title', true ); }
      if(!empty($title)) { 
        echo ' <title>'.$title.'</title>'; 
      } else if(!empty($virtue_premium['seo_sitetitle'])) {
        echo ' <title>'.$virtue_premium['seo_sitetitle'].'</title>';
      } else { ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
      <?php }
      if ( get_post_meta( get_the_ID(), '_kad_seo_description', true )) { 
        echo '<meta name="description" content="'.get_post_meta( get_the_ID(), '_kad_seo_description', true ).'">';
      } else if (!empty($virtue_premium['seo_sitedescription'])) {
        echo '<meta name="description" content="'.$virtue_premium['seo_sitedescription'].'">';
      } else {?>
      <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php }
    } else { ?>
      <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php }?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if(isset($virtue_premium['virtue_custom_favicon']['url']) && !empty($virtue_premium['virtue_custom_favicon']['url']) ) {?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($virtue_premium['virtue_custom_favicon']['url']); ?>" />
  <?php } ?>
  <?php wp_head(); ?>
  <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri() . '/assets/js/vendor/respond.min.js';?>"></script>
    <![endif]-->
</head>
