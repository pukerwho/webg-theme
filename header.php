<?php

$current_title = wp_get_document_title();
if ( is_singular() ) {
	//Название заведения
	if (carbon_get_the_post_meta('crb_post_title')) {
		$single_title = carbon_get_the_post_meta('crb_post_title');
	} else {
		$single_title = get_the_title();
	}
	if (carbon_get_the_post_meta('crb_post_description')) {
		$single_description = carbon_get_the_post_meta('crb_post_description');
	}
} else {
	$single_title = wp_get_document_title();
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php echo $single_title; ?></title>
	<?php if ($single_description): ?>
	<meta name="description" content="<?php echo $single_description; ?>" />
	<?php endif; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header class="w-full absolute top-0 left-0 z-1">
    <div class="hidden lg:block bg-dark-xl">
      <div class="container py-2">
        <div class="flex flex-wrap items-center justify-between lg:-mx-4">
          <div class="lg:px-4">
            <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => 'div',
            'menu_class' => 'header_menu text-custom-lightwhite flex items-center'
          ]); ?> 
          </div>
          <div class="lg:px-4">
            <div class="flex items-center text-gray-200 -mx-1">
              <?php if (function_exists('pll_the_languages')) {
                pll_the_languages(); 
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container py-4">
      <div class="flex justify-between flex-wrap items-center lg:-mx-4">
        <div class="lg:px-4">
          <a href="<?php echo home_url(); ?>" class="text-2xl text-custom-lightwhite font-extrabold"><span class="text-custom-yellow">WEB</span> Головоломки</a>
        </div>
        <div class="flex items-center lg:px-4">
          <?php wp_nav_menu([
            'theme_location' => 'header_bottom',
            'container' => 'div',
            'menu_class' => 'header_bottom text-custom-lightwhite hidden lg:flex'
          ]); ?> 
          <div class="hidden lg:block ml-6">
            <a href="/contacts" class="bg-custom-yellow rounded uppercase text-center font-bold text-sm px-4 py-2"><?php _e("Контакты", "web-g"); ?></a>
          </div>
          <!-- Гамбургер -->
          <div class="mobile-menu-open w-7 h-6 relative flex flex-col justify-center lg:hidden mt-1">
            <span class="w-7 h-0.5 absolute bg-gray-200 top-0 right-0"></span>
            <span class="w-7 h-0.5 absolute bg-gray-200 top-2 right-0"></span>
            <span class="w-7 h-0.5 absolute bg-gray-200 top-4 right-0"></span>
          </div>
          <!-- END Гамбургер -->
        </div>
      </div>
    </div>
  </header>

	<div class="mobile-menu hidden h-full w-full fixed left-0 top-0">
		<div class="bg-white px-2 py-4">
      <div class="flex justify-between items-center mb-6">
        <div><a href="<?php echo home_url(); ?>" class="text-2xl font-extrabold"><span class="text-custom-yellow">WEB</span> Головоломки</a></div>
        <div class="mobile-menu-close"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg></div>
      </div>
      <div class="border-b border-gray-300 pb-4 mb-4">
        <a href="/contacts" class="block bg-custom-yellow rounded uppercase text-center font-bold text-sm px-4 py-2"><?php _e("Контакты", "web-g"); ?></a>
      </div>
      <div class="font-bold uppercase mb-4"><?php _e("Меню", "web-g"); ?></div>
			<?php wp_nav_menu([
	      'theme_location' => 'mobile',
	      'container' => 'div',
	      'menu_class' => 'menu flex flex-col'
	    ]); ?> 
		</div>
    <div class="bg-custom-darkblue p-4">
      <div class="flex items-center">
        <div class="text-custom-lightwhite font-bold uppercase mr-4"><?php _e("Язык", "web-g"); ?>:</div>
        <div class="flex items-center text-gray-200 -mx-2">
          <?php if (function_exists('pll_the_languages')) {
            pll_the_languages(); 
          } ?>
        </div>
      </div>
    </div>
	</div>

