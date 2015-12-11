<header>
      <?php if(kadence_display_post_breadcrumbs()) { kadence_breadcrumbs(); } ?>
      <h1 class="entry-title" itemprop="name headline"><?php the_title(); ?></h1>
        <?php get_template_part('templates/entry', 'meta-subhead'); ?>
    </header>
<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination kt-pagination">', 'after' => '</nav>', 'link_before'=> '<span>','link_after'=> '</span>')); ?>
<?php endwhile; ?>