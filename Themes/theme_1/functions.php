<?php

/** 
 * загружаемые скриаты и стили
 */
function load_style_script()
{
    wp_enqueue_script('jquery-google', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js');
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js');
    wp_enqueue_script('jquery-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js');
    wp_enqueue_script('demo', get_template_directory_uri() . '/js/demo.js');
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.9.2.custom.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/flexslider.css');
    wp_enqueue_style('jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui-1.9.2.custom.css');
}

/** 
 * загружаем скриаты и стили
 */
add_action('wp_enqueue_scripts', 'load_style_script');

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
    //$option_group, $option_name
    register_setting(
            'general',
            'my_phone'
            );
}

add_action('admin_init', 'my_more_options');
function display_phone(){
    echo "<input type='text' name='my_phone' value='" . esc_attr(get_option('my_phone')) . "' class='regular-text'>"; 

}

/**
 * иконки
 */
register_sidebar(array(
                    'name' => 'Иконки в шапке', 
                    'id' => 'icons-header',
                    'description' => 'Используйте виджет Текст для добавления иконок',
                    'before_widget' => '', 
                    'after_widget'  => '',
                ));

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
      'menu_icon' => admin_url().'/images/media-button-video.gif',
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
 * список меток
 */
function my_list_tags($echo = true){
    $tags = get_the_tags();
    $tag_str = null;
    if($tags){
        $tag_str = "<p>";
        foreach ($tags as $item){
            $tag_str .= $item->name . ', ';
        }
        $tag_str = rtrim($tag_str, ', ');
        $tag_str .= "</p>";
    }
    if($echo) echo $tag_str;
        else return $tag_str;
    
}

/**
 * клиенты
 */
register_sidebar(array(
                    'name' => 'Клиенты', 
                    'id' => 'clients',
                    'description' => 'Используйте виджет Текст для добавления клиентов',
                    'before_widget' => '', 
                    'after_widget'  => '',
                ));

/**
 * метки категории
 */
function get_tags_in_cat($cat_id)
{
    $posts = get_posts(array('category' => $cat_id, 'numberposts' => -1));
    $tags = array();
    foreach ($posts as $item){
        $post_tags = get_the_tags($item->ID);
        if(!empty($post_tags)){   
            foreach ($post_tags as $tag){
                $tags[$tag->term_id] = $tag->name; 
            }
        }    
    }
    asort($tags);
    return $tags;
}

/**
* пагинация
**/
function wp_corenavi(){
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999)));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 2; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
	$a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

	if ($max > 1) echo '<div class="pager">';
	if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}

/**
 * клиенты
 */
register_sidebar(array(
                    'name' => 'Сайдбар в портфолио', 
                    'id' => 'single-portfolio',
                    'description' => 'Используйте виджет Текст для добавления текста в сайдбар',
                    'before_title' => '<h3><span>',
                    'after_title'  => '</span></h3>',
                    'before_widget' => '', 
                    'after_widget'  => '',
                ));