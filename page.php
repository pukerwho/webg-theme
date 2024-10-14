<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="relative">
    <div class="post-bg h-[180px] lg:h-[420px]"></div>
  </div>
  <div class="container pt-24 lg:pt-36 pb-8">
    <div><h1 class="text-3xl lg:text-5xl font-black text-custom-yellow text-center lg:leading-12 mb-6"><?php the_title(); ?></h1></div>
    <div class="bg-white rounded px-6 py-8">
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer();