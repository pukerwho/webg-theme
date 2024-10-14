<?php 
  //Полезных голосов
  $currentId = get_the_ID();
?>

<div>
  <div>
    <?php $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
    <?php if ($thumb): ?>
      <img class="w-full h-[225px] min-h-[225px] object-cover rounded" alt="<?php the_title(); ?>" src="<?php echo $thumb; ?>" loading="lazy">
    <?php else: ?>
      <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image.jpg" alt="<?php the_title(); ?>" class="w-full h-[225px] min-h-[225px] object-cover rounded">
    <?php endif; ?>
  </div>
  <div class="relative -mt-16">
    <div class="flex justify-center">
      <?php
      $post_categories = get_the_terms( $new_posts->ID, 'category' );
      foreach (array_slice($post_categories,0,1) as $post_category){ ?>
        <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="inline-block bg-custom-red text-white text-sm uppercase font-bold px-2 py-1"><?php echo $post_category->name; ?></a> 
      <?php } ?>
    </div>
    <div class="px-8">
      <div class="bg-white p-2">
        <div class="text-lg font-bold text-center mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="text-center text-sm">
          <?php 
            $content_text = wp_strip_all_tags( get_the_content() );
            echo mb_strimwidth($content_text, 0, 110, '...');
            unset($content_text);
          ?>
        </div>
        <div class="hidden items-center justify-center text-sm opacity-75">
          <div class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[16px] h-[16px]"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
          </div>
          <div></div>
          <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
            <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
          <?php else: ?>
            <span class="italic"><?php echo get_the_author(); ?></span> 
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>