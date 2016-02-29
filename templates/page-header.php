<div class="page-header">
  <h1 class="entry-title" itemprop="name">
    <?php echo apply_filters('bigcloudcms_page_title', bigcloudcms_title() ); ?>
    <?php if(bigcloudcms_display_page_breadcrumbs()) { bigcloudcms_breadcrumbs(); } ?>
  </h1>
  <?php global $post; 
  if(is_page()) {$bsub = get_post_meta( $post->ID, '_kad_subtitle', true ); if(!empty($bsub)) echo '<p class="subtitle"> '.__($bsub).' </p>'; }
   else if(is_category()) {  echo '<p class="subtitle">'.__(category_description()).' </p>';}
   	?>
</div>