<?php get_header(); ?>

<div class="relative">
  <div class="post-bg h-[180px] lg:h-[420px]"></div>
</div>
<div class="container pt-24 lg:pt-36 pb-8">
  <div class="flex flex-wrap lg:-mx-4">
    <main class="w-full mb-6 lg:mb-0">
      <h1 class="text-3xl text-custom-yellow font-bold uppercase underline decoration-wavy mb-6"><?php _e('Вопросы и ответы', 'web-g'); ?></h1>
      <div class="bg-white rounded px-6 py-8 pb-4">
        <div class="flex flex-wrap lg:-mx-4">
          <?php 
            $q_list = new WP_Query( array( 
              'post_type' => 'questions', 
              'posts_per_page' => 30,
            ) );
            if ($q_list->have_posts()) : while ($q_list->have_posts()) : $q_list->the_post(); 
          ?>
          <!-- Item -->
          <div class="w-full lg:w-1/3 lg:px-4 mb-4">
            <?php get_template_part('template-parts/posts/q-item'); ?>
          </div>
          <!-- END Item -->
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </main>
  </div>
</div>

<?php get_footer(); ?>
