<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php 
    $currentId = get_the_ID();
    $translated_ids = pll_get_post_translations($currentId);
    $countNumber = tutCount($currentId);
  ?>
  <div class="relative">
    <div class="post-bg h-[340px] lg:h-[420px]"></div>
  </div>
  <div class="container pt-24 lg:pt-36 pb-8">
    <div class="flex flex-wrap lg:-mx-4">
      <main class="w-full lg:w-3/4 lg:px-4 mb-6 lg:mb-0">
        <div><h1 class="text-3xl lg:text-4xl text-custom-lightwhite font-black mb-6"><?php the_title(); ?></h1></div>
        <div class="flex bg-black/85 text-white mb-6">
          <div class="w-full lg:w-auto flex lg:inline-flex flex-col lg:flex-row lg:items-center lg:justify-center bg-custom-darkblue text-white border border-custom-lightwhite rounded px-4 py-2 lg:space-x-4">
            <div class="flex items-center lg:border-r lg:border-gray-500 lg:pr-4 mb-2 lg:mb-0">
              <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[24px] h-[24px]"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" /></svg>
              </div>
              <span class="inline-block lg:hidden mr-1"><?php _e("Вопрос задан", "web-g"); ?>:</span> <?php echo get_the_modified_time('d.m.Y'); ?>
            </div>
            <div class="flex items-center lg:border-r lg:border-gray-500 lg:pr-4 mb-2 lg:mb-0">
              <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[24px] h-[24px]"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
              </div>
              <span class="inline-block lg:hidden mr-1"><?php _e("Ответов", "web-g"); ?>: </span>
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
        <div class="content bg-white rounded px-6 py-8 mb-6">
          <?php the_content(); ?>
        </div>
        <div>
          <h2 class="text-3xl text-custom-darkblue font-bold uppercase underline decoration-wavy mb-6"><?php _e('Ответы', 'web-g'); ?>:</h2>
          <div>
            <?php comments_template(); ?>
          </div>
        </div>
      </main>
      <aside class="w-full lg:w-1/4 lg:px-4">
        <div class="bg-white rounded mb-4">
          <div class="text-xl text-custom-darkblue font-bold uppercase underline decoration-wavy px-4 pt-3 mb-4"><?php _e("Новые вопросы", "web-g"); ?></div>
          <div>
            <?php 
            $new_q = new WP_Query( array( 
              'post_type' => 'questions', 
              'posts_per_page' => 5,
            ) );
            if ($new_q->have_posts()) : while ($new_q->have_posts()) : $new_q->the_post(); 
            ?>
            <div class="border-b border-gray-300 border-dashed pb-2 mb-2">
              <div class="px-4 py-1">
                <a href="<?php the_permalink(); ?>" class="hover:text-custom-red"><?php the_title(); ?></a>  
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
      </aside>
    </div>
  </div>
<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
