<?php
/*
Template Name: Все записи
*/
?>

<?php get_header(); ?>

<div class="relative">
  <div class="post-bg h-[180px] lg:h-[420px]"></div>
</div>
<div class="container pt-24 lg:pt-36 pb-12">
  <h1 class="text-3xl text-custom-yellow font-bold text-center uppercase underline decoration-wavy mb-6"><?php _e('Все записи', 'web-g'); ?></h1>
  <div class="flex flex-wrap lg:-mx-4">
    <div class="flex flex-wrap lg:-mx-4 mb-6">
      <?php 
        global $wp_query, $wp_rewrite;  
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        $posts_list = new WP_Query( array( 
          'post_type' => 'post', 
          'posts_per_page' => 21,
          'order'    => 'DESC',
          'paged' => $current,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field'    => 'term_id',
              'terms'    => array( 52, 50 ),
              'operator' => 'NOT IN',
            )
          ),
        ) );
        if ($posts_list->have_posts()) : while ($posts_list->have_posts()) : $posts_list->the_post(); 
      ?>
      <!-- Post item -->
      <div class="w-full lg:w-1/3 lg:px-4 mb-8">
        <?php get_template_part('template-parts/posts/post-item'); ?>
      </div>
      <!-- END Post item -->
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="mx-auto mb-6">
      <div class="flex items-center -mr-3">
        <?php 
          $big = 9999999991; // уникальное число
          echo paginate_links( array(
            'format'  => 'page/%#%',
            'total' => $posts_list->max_num_pages,
            'current' => $current,
            'prev_next' => true,
            'next_text' => ('>'),
            'prev_text' => ('<'),
          )); 
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
