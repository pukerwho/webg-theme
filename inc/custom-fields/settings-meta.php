<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options', 1 );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Treba Settings') )
  ->add_tab( __('Cайдбар'), array(
    Field::make( 'complex', 'crb_best_hosters', 'Рейтинг хостеров' )->add_fields( array(
      Field::make( 'text', 'crb_best_hoster_name', 'Название хостера' ),
      Field::make( 'text', 'crb_best_hoster_link', 'Ссылка на хостера' ),
      Field::make( 'text', 'crb_best_hoster_rating', 'Рейтинг хостера' ),
    )),
  ))
  ->add_tab( __('Скрипты'), array(
    Field::make( 'textarea', 'crb_google_analytics', 'Google Analytics' ),
    Field::make( 'footer_scripts', 'crb_footer_scripts', 'Скрипты в футере' )
  ))->add_tab( __('Загальні'), array(
    Field::make( 'text', 'crb_footer_links_numbers', 'Кількість посилань' ),
    Field::make( 'text', 'crb_top_post_id'. crb_get_i18n_suffix(), 'Популярні статті - ID' ),
    Field::make( 'text', 'crb_top_post_id_bottom'. crb_get_i18n_suffix(), 'Популярні статті - ID - Bottom' ),
    Field::make( 'text', 'crb_contact_link'. crb_get_i18n_suffix(), 'Посилання на Контакти' ),
  ));
  
}

?>