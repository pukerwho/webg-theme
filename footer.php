<footer class="bg-custom-darkblue border-b-8 border-custom-red py-12">
  <div class="container">
    <div class="flex flex-wrap lg:-mx-4">
      <div class="w-full lg:w-1/3 lg:px-4 mb-6 lg:mb-0">
        <div class="mb-4"><a href="<?php echo home_url(); ?>" class="text-2xl text-custom-lightwhite font-extrabold"><span class="text-custom-yellow">WEB</span> Головоломки</a></div>
        <div class="text-white mb-6">
          <?php _e("Ресурс WEB Головоломки создан для того, чтобы делиться накопленным опытом и знаниями.", "web-g"); ?>
        </div>
        <div class="mb-6">
          <div class="text-custom-lightwhite text-sm font-bold uppercase mb-4"><?php _e("Напишите нам", "web-g"); ?></div>
          <div><a href="mailto:info@webgolovolomki.com" class="text-custom-yellow">info@webgolovolomki.com</a></div>
        </div>
        <div class="mb-6">
          <div class="text-custom-lightwhite text-sm font-bold uppercase mb-4"><?php _e("Мы в соцсетях", "web-g"); ?></div>
          <div class="flex items-center text-white -mx-2">
            <div class="px-2"><a href="https://t.me/webgolovolomki" target="_blank"><svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="h-4 lg:h-5 w-4 lg:w-5" xmlns="http://www.w3.org/2000/svg"><path fill="#35abde" d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931l3.622-16.972.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693 12.643-7.911c.595-.394 1.136-.176.691.218z"></path></svg></a></div>
            <div class="px-2"><a href="https://www.youtube.com/channel/UCLFjGPaobP5RrvweG-p_lpA" target="_blank"><svg class="h-4 lg:h-5 w-4 lg:w-5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 461.001 461.001" xml:space="preserve"><g><path style="fill:#F61C0D;" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728 c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137 C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607 c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/></g></svg></a></div>
          </div>
        </div>
        <div>
          <div class="text-custom-lightwhite text-sm font-bold uppercase mb-4"><?php _e("Партнеры", "web-g"); ?></div>
          <a href="https://d-art.org.ua/">
            <img src="https://webgolovolomki.com/wp-content/uploads/2023/05/dart-favicon.jpg" width="20">
          </a>
        </div>
      </div>
      <div class="w-full lg:w-1/3 lg:px-4 mb-6 lg:mb-0">
        <div class="text-custom-lightwhite font-bold uppercase mb-4"><?php _e("Навигация", "web-g"); ?></div>
        <?php wp_nav_menu([
          'theme_location' => 'header_bottom',
          'container' => 'div',
          'menu_class' => 'text-custom-yellow [&>li]:mb-2'
        ]); ?>
      </div>
      <div class="w-full lg:w-1/3 lg:px-4">
        <div class="text-custom-lightwhite font-bold uppercase mb-4"><?php _e("Меню", "web-g"); ?></div>
        <?php wp_nav_menu([
          'theme_location' => 'header_menu',
          'container' => 'div',
          'menu_class' => 'text-custom-yellow [&>li]:mb-2'
        ]); ?>
      </div>
    </div>
  </div>
</footer>

<div class="modal-bg hidden"></div>

<!-- not use -->
<div class="current-lang"></div>
<!-- END not use -->

<?php wp_footer(); ?>

</body>
</html>
