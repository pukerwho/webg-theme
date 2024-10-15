<?php get_header(); ?>
  <div class="welcome pt-24 lg:pt-36 pb-16">
    <div class="container">
      <h1 class="text-3xl lg:text-5xl text-white font-extrabold text-center mb-8"><?php _e("Полезные", "web-g"); ?> <span class="text-custom-yellow underline decoration-wavy"><?php _e("советы", "web-g"); ?></span> <?php _e("на каждый день", "web-g"); ?></h1>
      <div class="w-full lg:w-2/3 mx-auto mb-8">
        <form role="search" method="get" class="search-form flex items-center relative" action="<?php echo home_url( '/' ); ?>">
          <div class="absolute right-5 top-3 text-custom-lightwhite">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>  
          </div>
          <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="w-full bg-custom-darkblue border-2 border-custom-lightwhite text-custom-lightwhite rounded-full px-4 pr-10 py-2" placeholder="<?php _e('Поиск', 'web-g'); ?>" />
          <input type="hidden" name="post_type" value="places" />
          <input type="submit" class="search-submit hidden" value="<?php echo esc_attr_x( 'Найти', 'submit button' ) ?>" />
        </form>
      </div>
      <div class="welcome-posts flex flex-wrap px-2">
        <?php 
        $top_posts = carbon_get_theme_option('crb_top_post_id'); 
        $top_posts_id = explode(",", $top_posts);
        foreach (array_slice($top_posts_id, 0,5) as $top_post_id):
        ?>
          <div class="w-1/2 lg:w-1/5 last-of-type:hidden lg:last-of-type:block px-2 py-4">
            <div class="h-full relative bg-custom-darkblue rounded-b-lg">
              <a href="<?php echo get_the_permalink($top_post_id); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
              <div class="relative">
                <?php 
                  $medium_thumb = get_the_post_thumbnail_url($top_post_id, 'medium');
                  $large_thumb = get_the_post_thumbnail_url($top_post_id, 'large');
                ?>
                <img class="w-full h-[125px] object-cover rounded-t-lg" alt="<?php echo get_the_title($top_post_id); ?>" src="<?php echo $medium_thumb; ?>" srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" loading="lazy" data-src="<?php echo $medium_thumb; ?>" data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
                <div class="absolute bottom-0 left-0">
                  <div class="bg-custom-red px-2 py-1">
                    <?php
                    $post_categories = get_the_terms( $top_post_id, 'category' );
                    foreach (array_slice($post_categories,0,1) as $post_category){ ?>
                      <div class="uppercase text-white text-xs lg:text-sm font-bold"><?php echo $post_category->name; ?></div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="p-4">
                <div class="text-base lg:text-lg text-white"><?php echo get_the_title($top_post_id); ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="bg-custom-darkblue">
    <div class="container">
      <div class="flex flex-wrap items-center py-8">
        <div class="w-full lg:w-1/4 flex justify-center mb-8 lg:mb-0">
          <div class="inline-flex items-center bg-custom-yellow px-4 py-2">
            <div class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[32px] h-[32px]"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" /></svg></div>
            <div class="uppercase font-extrabold"><?php _e("Выбор читателей", "web-g"); ?></div>
          </div>
        </div>
        <div class="w-full lg:w-3/4">
          <?php 
          $top_posts_bottom = carbon_get_theme_option('crb_top_post_id_bottom'); 
          $top_posts_bottom_id = explode(",", $top_posts_bottom);
          foreach (array_slice($top_posts_bottom_id, 0,3) as $top_post_bottom_id):
          ?>
          <?php 
            $currentId = $top_post_bottom_id;
            $countNumber = tutCount($currentId);
          ?>
          <div class="w-full border-b border-gray-600 last-of-type:border-none border-dashed pb-2 mb-2 last-of-type:mb-0 last-of-type:pb-0 ">
            <div class="text-sm text-custom-lightwhite mb-1"><?php _e("Просмотров", "web-g"); ?>: <?php echo $countNumber; ?></div>
            <div class="flex flex-wrap flex-col lg:flex-row lg:justify-between lg:items-center">
              <div class="text-white mb-2 lg:mb-0 mr-0 lg:mr-2"><a href="<?php echo get_the_permalink($currentId); ?>"><?php echo get_the_title($currentId); ?></a></div>
              <div class="flex items-center">
                <div class="mr-2">👍</div> 
                <div class="text-gray-200">
                  <?php _e('Полезно', 'web-g'); ?> - <span class="w-6 h-6 inline-flex justify-center items-center bg-green-500 text-white rounded"><?php echo get_vote_count($currentId, 'meta_up_'); ?></span>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="category-list border-t-8 border-custom-red mb-16">
    <div class="container">
      <div class="inline-block bg-custom-red uppercase text-white font-black px-4 py-2 mb-6"><?php _e("Популярные категории", "treba-wp"); ?></div>
      <div class="flex flex-wrap -mx-2">
        <?php $home_categories = get_terms( array( 
          'taxonomy' => 'category', 
          'parent' => 0, 
          'hide_empty' => false,
          'meta_query' => array(
            array(
              'key'       => '_crb_category_home_show',
              'value'     => 'yes',
              'compare'   => '='
            )
          )
        ));
        foreach ( array_slice($home_categories, 0, 6) as $home_category ): ?>
        <div class="w-1/2 lg:w-1/6 px-2">
          <div class="relative">
            <img src="<?php echo carbon_get_term_meta($home_category->term_id, 'crb_category_img' ); ?>" alt="<?php echo $home_category->name ?>" loading="lazy" class="w-full h-[185px] min-h-[185px] lg:h-[185px] lg:min-h-[185px] object-cover border-b-4 border-custom-red mb-2">
            <a href="<?php echo get_term_link($home_category); ?>" class="absolute-link"></a>
            <div class="text-custom-darkblue font-bold"><?php echo $home_category->name ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="flex flex-wrap lg:-mx-4">
      <main class="w-full lg:w-3/4 lg:px-4">
        <h2 class="text-3xl text-custom-darkblue font-bold uppercase underline decoration-wavy mb-6"><?php _e("Новые записи", "web-g"); ?></h2>
        <div class="flex flex-wrap lg:-mx-4">
          <?php 
            $new_posts = new WP_Query( array( 
              'post_type' => 'post', 
              'posts_per_page' => 16,
              'meta_query' => array(
                array(
                  'key' => '_crb_post_mainhide',
                  'value' => 'yes',
                  'compare' => '!='
                ),
              ),
              'tax_query' => array(
                array(
                  'taxonomy' => 'category',
                  'field'    => 'term_id',
                  'terms'    => array( 52, 50 ),
                  'operator' => 'NOT IN',
                )
              ),
            ) );
            if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
          ?>
          <div class="w-full lg:w-1/2 lg:px-4 mb-8">
            <?php get_template_part('template-parts/posts/post-item'); ?>
          </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </main>
      <aside class="w-full lg:w-1/4 lg:px-4">
        <?php get_template_part("template-parts/sidebar/sidebar"); ?>
      </aside>
    </div>
  </div>
  
	

<?php
get_footer();
