<?php

/** 
 * загружаемые скриаты и стили
 */
function load_style_script()
{
    wp_enqueue_style('reset-css', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('zerogrid-css', get_template_directory_uri() . '/css/zerogrid.css');
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/css/responsive.css');
    
    wp_enqueue_script('jquery-1.6.3', get_template_directory_uri() . '/js/jquery-1.6.3.min.js');
    wp_enqueue_script('cufon-yui', get_template_directory_uri() . '/js/cufon-yui.js');
    wp_enqueue_script('cufon-replace', get_template_directory_uri() . '/js/cufon-replace.js');
    wp_enqueue_script('Kozuka_Gothic_300', get_template_directory_uri() . '/js/Kozuka_Gothic_Pro_OpenType_300.font.js');
    wp_enqueue_script('Kozuka_Gothic_700', get_template_directory_uri() . '/js/Kozuka_Gothic_Pro_OpenType_700.font.js');
    wp_enqueue_script('Kozuka_Gothic_900', get_template_directory_uri() . '/js/Kozuka_Gothic_Pro_OpenType_900.font.js');
    wp_enqueue_script('FF-cash', get_template_directory_uri() . '/js/FF-cash.js');
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js');
    wp_enqueue_script('tms-0.3', get_template_directory_uri() . '/js/tms-0.3.js');
    wp_enqueue_script('tms-presets', get_template_directory_uri() . '/js/tms_presets.js');
    wp_enqueue_script('easyTooltip', get_template_directory_uri() . '/js/easyTooltip.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
    wp_enqueue_script('css3-mediaqueries', get_template_directory_uri() . '/js/css3-mediaqueries.js');
}

/** 
 * загружаем скриаты и стили
 */
add_action('wp_enqueue_scripts', 'load_style_script');

/**
 * регистрации меню
 */
register_nav_menus(array(
                    'header-menu' => 'Меню в шапке',
                    'footer-menu' => 'Меню в подвале',
                    ));

/**
 * слайдер на главной
 */
function slider_index()
{
  register_post_type('slider_index',array(
      'public' => true,
      'supports' => array('title', 'editor', 'thumbnail'),
      'menu_position' => 100,
      //'menu_icon' => admin_url().'/images/media-button-video.gif',
      'labels' => array(
          'name' => 'Слайдeры',
          'add_new' => 'Добавить слайд',
          'all_items' => 'Все слайды',
          'add_new_item' => 'Добавить новый слайд',
      )
      
  ));
}
add_action('init', 'slider_index');

/**
 * поддержка миниатюр
 */
add_theme_support('post-thumbnails');

/**
 * About на главной
 */

function get_the_content_by_id($post_id) {
  $page_data = get_page($post_id);
  if ($page_data) {
        return apply_filters('the_content', $page_data->post_content);
  }
  else return false;
}

/**
 * иконки в футере
 */
register_sidebar(array(
                    'name' => 'Иконки в футере', 
                    'id' => 'icons-footer',
                    'description' => 'Используйте виджет Текст для добавления иконок в футер',
                    'before_widget' => '', 
                    'after_widget'  => '',
                ));
/**
 * контакты в футере
 */
register_sidebar(array(
                    'name' => 'Контакты в футере', 
                    'id' => 'contacts-footer',
                    'description' => 'Используйте виджет Текст для добавления контактов в футер',
                    'before_widget' => '', 
                    'after_widget'  => '',
                ));
/**
 * legal в футере
 */
register_sidebar(array(
                    'name' => 'legal в футере', 
                    'id' => 'legal-footer',
                    'description' => 'Используйте виджет Текст для добавления информации в футер',
                    'before_widget' => '', 
                    'after_widget'  => '',
                ));

/**
 * опции
 */
function my_more_options(){
    //$id, $title, $callback, $page
    add_settings_field(
            'phone',
            'Телефон',
            'display_phone',
            'general'
            );
    add_settings_field(
            'fax',
            'Факс',
            'display_fax',
            'general'
            );
    add_settings_field(
            'freephone',
            'Мобильный',
            'display_free',
            'general'
            );
    //$option_group, $option_name
    register_setting(
            'general',
            'my_phone'
            );
    register_setting(
            'general',
            'my_fax'
            );
    register_setting(
            'general',
            'my_free'
            );
}

add_action('admin_init', 'my_more_options');
function display_phone(){
    echo "<input type='text' name='my_phone' value='" . esc_attr(get_option('my_phone')) . "' class='regular-text'>"; 
}
function display_fax(){
    echo "<input type='text' name='my_fax' value='" . esc_attr(get_option('my_fax')) . "' class='regular-text'>"; 
}
function display_free(){
    echo "<input type='text' name='my_free' value='" . esc_attr(get_option('my_free')) . "' class='regular-text'>"; 
}

/*
 * метки сотрудников
 */

function tags_testimonials($id){
    $posttags = get_the_tags($id);
    if ($posttags) {
      foreach($posttags as $tag) {
            echo $tag->name . ' '; 
      }
    }
}

/*
 * разметка title в mains services
 */
function main_serv_title($title){
    $first = substr($title,0,strpos(trim($title),' '));
    $first_len = strlen($first);
    $second = substr($title, $first_len);
    return $first . '<strong>' . $second . '</strong>';
}

/*
 * проход по алфавиту
 */
function str_letter($number){
    $string = 'abcdefghagklmnopqrstuvwywz';
    $letter = substr($string, $number, 1);
    return strtoupper($letter);
    
}

/*
 * условия для клиентов
 */
register_sidebar(array(
                    'name' => 'Условия для клиентов', 
                    'id' => 'conditions',
                    'description' => 'Используйте виджет Текст для условий для клиентов',
                    'before_widget' => '', 
                    'after_widget'  => '',
                ));
/*
 * слайды
 */
function get_slides(){
    global $wpdb;
    $slides_content = array();
    $slides_id = $wpdb->get_results( "SELECT id, post_content FROM $wpdb->posts WHERE post_type = 'slider_index'" );
    $pattern = "/^\[raw\]|\[\/raw\]$/";
    foreach ($slides_id as $item){
        $slides_content[] = preg_replace($pattern, '', $item->post_content);
    }
    return $slides_content;
}