<?php get_header(); ?>

  <div class="relative">
    <div class="post-bg h-[180px] lg:h-[420px]"></div>
  </div>
  <div class="container pt-24 lg:pt-36 pb-8">
    <div class="flex flex-wrap lg:-mx-4">
      <main class="w-full lg:w-3/4 lg:px-4">
        <h1 class="text-3xl text-custom-yellow font-bold uppercase underline decoration-wavy mb-6"><?php the_archive_title(); ?></h1>
        <div class="flex flex-wrap lg:-mx-4 mb-6">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <!-- Post item -->
            <div class="w-full lg:w-1/2 lg:px-4 mb-8">
              <?php get_template_part('template-parts/posts/post-item'); ?>
            </div>
          <!-- END Post item -->
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <div>
          <?php posts_nav_link(); ?>	
        </div>
      </main>
      <aside class="w-full lg:w-1/4 lg:px-4">
        <?php get_template_part("template-parts/sidebar/sidebar"); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>
