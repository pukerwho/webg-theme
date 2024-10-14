<div class="bg-white rounded mb-4">
  <div class="text-xl text-custom-darkblue font-bold uppercase underline decoration-wavy px-4 pt-3 mb-2"><?php _e("Все категории", "web-g"); ?></div>
  <div class="py-2">
    <?php $all_categories = get_terms( array( 
      'taxonomy' => 'category', 
      'parent' => 0, 
      'hide_empty' => false,
    ));
    foreach ( $all_categories as $all_category ): ?>
    <div class="border-b-2 border-dotted border-gray-200 pb-2 mb-2 last-of-type:mb-0 last-of-type:pb-0 last-of-type:border-transparent">
      <a href="<?php echo get_term_link($all_category); ?>" class="text-gray-600 hover:text-custom-red font-light px-4"><?php echo $all_category->name ?></a>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="bg-white rounded mb-4">
  <div class="text-xl text-custom-darkblue font-bold uppercase underline decoration-wavy px-4 pt-3 mb-2"><?php _e("Рекомендуем", "web-g"); ?></div>
  <div>
    <?php 
    $now_posts = new WP_Query( array( 
      'post_type' => 'post', 
      'posts_per_page' => 10,
      'orderby' => 'rand',
      'meta_query' => array(
        array(
          'key' => '_crb_post_keywords',
          'value' => '',
          'compare' => '='
        ),
      ),
      'tax_query' => array(
        array(
          'taxonomy'  => 'category',
          'field'     => 'term_id',
          'terms'     => array( 52, 50, 595, 597, 32, 6 ),
        )
      ),
    ) );
    if ($now_posts->have_posts()) : while ($now_posts->have_posts()) : $now_posts->the_post(); 
    ?>
    <div class="w-full relative cursor-pointer mb-2">
      <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
      <div class="flex items-center justify-between text-gray-800 rounded px-4 py-3">
        <div class="w-1/3">
          <?php if (get_the_post_thumbnail_url()): ?>
            <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" class="object-cover aspect-video">
          <?php else: ?>
            <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image.jpg" alt="<?php the_title(); ?>" class="object-cover aspect-video">
          <?php endif; ?>
        </div>
        <div class="w-2/3"><div class="text-sm ml-4"><?php the_title(); ?></div></div>
      </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>

<div class="bg-white rounded mb-4">
  <div class="text-xl text-custom-darkblue font-bold uppercase underline decoration-wavy px-4 pt-3 mb-2"><?php _e("Люди ищут", "web-g"); ?></div>
  <div class="people-search py-2">
    <?php 
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $footer_links = footer_links($current_url);
    foreach ($footer_links as $footer_link):
    ?>
    <div class="border-b-2 border-dotted border-gray-200 pb-2 mb-2 last-of-type:mb-0 last-of-type:pb-0 last-of-type:border-transparent lowcase">
      <?php echo $footer_link->top_links; ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>