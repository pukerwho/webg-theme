<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php 
    $currentId = get_the_ID();
    $translated_ids = pll_get_post_translations($currentId);
    $countNumber = tutCount($currentId);
  ?>
  <div class="relative">
    <div class="post-bg h-[180px] lg:h-[420px]"></div>
  </div>
  <div class="container pt-24 lg:pt-36 pb-8">
    <div class="flex flex-wrap lg:-mx-4">
      <main class="w-full lg:w-3/4 lg:px-4 mb-6 lg:mb-0">
        <div>
          <?php $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
          <?php if ($thumb): ?>
            <img class="w-full h-full object-cover rounded-lg mb-6" alt="<?php the_title(); ?>" src="<?php echo $thumb; ?>" loading="lazy">
          <?php endif; ?>
        </div>
        <div class="flex items-center mb-6">
          <?php $post_categories = get_the_terms( get_the_ID(), 'category' );  
          foreach ($post_categories as $post_category){ ?>
            <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="inline-block bg-custom-red text-white uppercase font-bold rounded px-2 lg:px-4 py-2 mr-2"><?php echo $post_category->name; ?></a> 
          <?php } ?>
        </div>
        <div><h1 class="text-3xl lg:text-5xl font-black text-custom-darkblue lg:leading-12 mb-6"><?php the_title(); ?></h1></div>
        <div class="flex bg-black/85 text-white mb-6">
          <div class="w-full lg:w-auto flex lg:inline-flex flex-col lg:flex-row lg:items-center lg:justify-center bg-custom-darkblue text-white border border-gray-200 rounded px-4 py-2 lg:space-x-4">
            <div class="text-custom-yellow lg:border-r lg:border-gray-500 lg:pr-4 mb-2 lg:mb-0">
              <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
                <span class="font-bold"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
              <?php else: ?>
                <span class="font-bold"><?php echo get_the_author(); ?></span>
              <?php endif; ?>
            </div>
            <div class="flex items-center lg:border-r lg:border-gray-500 lg:pr-4 mb-2 lg:mb-0">
              <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[24px] h-[24px]"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" /></svg>
              </div>
              <span class="inline-block lg:hidden mr-1"><?php _e("Дата", "web-g"); ?>:</span> <?php echo get_the_modified_time('d.m.Y'); ?>
            </div>
            <div class="flex items-center lg:border-r lg:border-gray-500 lg:pr-4 mb-2 lg:mb-0">
              <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[24px] h-[24px]"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
              </div>
              <span class="inline-block lg:hidden mr-1"><?php _e("Комментариев", "web-g"); ?>: </span>
              <?php 
                $post__in_array = array(); $translation_id = pll_get_post_translations(get_the_ID());
                foreach ($translation_id as $tr_id) { array_push($post__in_array, $tr_id); }
                $args = array( 'type' => 'comment', 'post__in' => $post__in_array, 'status' => 'approve' );
                $comments = get_comments( $args );
                echo count($comments);
              ?>
            </div>
            <div class="flex items-center">
              <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[24px] h-[24px]"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
              </div>
              <span class="inline-block lg:hidden mr-1"><?php _e("Просмотров", "web-g"); ?>: </span>
              <?php echo $countNumber; ?>
            </div>
          </div>
        </div>
        <div class="single-subjects mb-6">
          <div class="single-subjects-title text-2xl text-custom-darkblue font-bold uppercase underline decoration-wavy mb-6">
            <?php _e("Содержание", "web-g"); ?>:
          </div>
          <div class="single-subjects-inner text-xl"></div>
        </div>
        <div class="content mb-8">
          <?php the_content(); ?>
        </div>
        <!-- Оценка -->
        <div class="text-gray-800 mb-12 js-post-vote" data-post-id="<?php echo $currentId; ?>" data-local-translate-id="<?php foreach( $translated_ids as $id) {echo $id;} ?>">
          <div class="text-xl text-center font-semibold mb-6"><?php _e('Статья была полезной?', 'web-g'); ?></div>
          <div class="flex justify-center items-center text-md lg:text-lg -mx-2 lg:-mx-4">
            <!-- Up -->
            <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="meta_up_">
              <div class="flex justify-center items-center bg-gray-200 rounded text-center px-3 lg:px-6 py-2">
                <div class="mr-4">👍</div>
                <div><?php _e('Да', 'web-g'); ?> - <span class="js-vote-result"><?php echo get_vote_count($currentId, 'meta_up_'); ?></span></div>
              </div>  
            </div>
            <!-- END Up -->
            <!-- Down -->
            <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="meta_down_">
              <div class="flex justify-center items-center bg-gray-200 rounded text-center px-3 lg:px-6 py-2">
                <div class="mr-4">👎</div>
                <div><?php _e('Нет', 'web-g'); ?> - <span class="js-vote-result"><?php echo get_vote_count($currentId, 'meta_down_'); ?></span></div>
              </div>  
            </div>
            <!-- END Down -->
          </div>
        </div>
        <!-- END Оценка -->
        <!-- Рекомендуемые статьи -->
        <div class="mb-8">
          <div class="bg-white rounded-lg relative p-6">
            <div class="absolute top-0 right-0 text-blue-800 lg:translate-x-4 -translate-y-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
            </div>
            <div class="text-2xl font-semibold text-gray-800 mb-6"><?php _e('Рекомендуем к прочтению', 'web-g'); ?></div>

            <?php if (carbon_get_the_post_meta('crb_similar_links')): ?>
              <!-- Cами выбираем ссылки -->
              <?php 
              $similar_links = carbon_get_the_post_meta('crb_similar_links');
              foreach ($similar_links as $link):
              ?>
                <?php $link_id = $link['id']; ?>
                <div class="flex text-xl text-blue-800 font-light mb-4 last-of-type:mb-0">
                  <div class="w-4 min-w-[1rem] h-4 min-h-4 rounded-full bg-custom-yellow mr-4 translate-y-[0.4rem]"></div>
                  <a href="<?php echo get_the_permalink($link_id); ?>" class="text-blue-600"><?php echo get_the_title($link_id); ?></a>
                </div>
              <?php endforeach; ?>
              <!-- END Cами выбираем ссылки -->

            <?php else: ?>

              <!-- Автоматом вставляются ссылки -->
              <?php 
                $current_id = get_the_ID();
                $other_query = new WP_Query( array( 
                  'post_type' => 'post', 
                  'posts_per_page' => 5,
                  'post__not_in' => array($current_id),
                  'orderby' => 'rand',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'category',
                      'terms' => $post_category,
                      'field' => 'term_id',
                      'include_children' => true,
                      'operator' => 'IN'
                    )
                  ),
                ) );
              if ($other_query->have_posts()) : while ($other_query->have_posts()) : $other_query->the_post(); ?>
                <div class="flex text-xl text-blue-800 font-light mb-4 last-of-type:mb-0">
                  <div class="w-4 min-w-[1rem] h-4 min-h-4 rounded-full bg-custom-yellow mr-4 translate-y-[0.45rem]"></div>
                  <a href="<?php the_permalink(); ?>" class="text-blue-600"><?php the_title(); ?></a>
                </div>
              <?php endwhile; endif; wp_reset_postdata(); ?>
              <!-- END Автоматом вставляются ссылки -->
            <?php endif; ?>
          </div>
        </div>
        <!-- Рекомендуемые статьи -->
        <!-- Комментарии -->
        <div class="mb-8">
          <div class="text-3xl text-custom-darkblue font-bold uppercase underline decoration-wavy mb-6"><?php _e('Комментарии', 'web-g'); ?>: </div>
          <?php comments_template(); ?>
        </div>
        <!-- END Комментарии -->
        <!-- Хлебные крошки -->
        <div class="breadcrumbs text-sm text-gray-800 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
          <ul class="flex items-center flex-wrap">
            <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
              <a itemprop="item" href="<?php echo home_url(); ?>" class="text-blue-700">
                <span itemprop="name"><?php _e( 'Главная', 'web-g' ); ?></span>
              </a>                        
              <meta itemprop="position" content="1">
            </li>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php echo get_page_url('templates/tpl_posts'); ?>" class="text-blue-700">
                <span itemprop="name"><?php _e( 'Все записи', 'web-g' ); ?></span>
              </a>                        
              <meta itemprop="position" content="2">
            </li>
            <?php 
              $post_categories = get_the_terms( get_the_ID(), 'category' ); 
              foreach (array_slice($post_categories, 0, 1) as $post_item): 
            ?>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php echo get_term_link($post_item->term_id, 'category') ?>" class="text-blue-700">
                <span itemprop="name"><?php echo $post_item->name; ?></span>
              </a>                        
              <meta itemprop="position" content="3">
            </li>
            <?php endforeach; ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
              <span itemprop="name"><?php the_title(); ?></span>
              <meta itemprop="position" content="4" />
            </li>
          </ul>
        </div>
        <!-- END Хлебные крошки -->
      </main>
      <aside class="w-full lg:w-1/4 lg:px-4">
        <?php get_template_part("template-parts/sidebar/sidebar"); ?>
      </aside>
    </div>
  </div>
<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer();