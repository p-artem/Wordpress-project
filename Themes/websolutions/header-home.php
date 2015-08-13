<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/<?php bloginfo('template_url'); ?>/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" type="text/css" media="screen">
	<![endif]-->
    <?php wp_head(); ?>
</head>
<body id="page1">
	<!--==============================header=================================-->
    <header>
    	<div class="main zerogrid">
        	<div class="prev-indent-bot2">
                <h1><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" /></a></h1>
                    <?php wp_nav_menu(array(
                                    'theme_location' => 'header-menu', 
                                    'container' => 'nav',
                                    'menu_class'=> 'menu'
                                ));  ?>               
                <div class="clear"></div>
            </div>
        </div>
        <div class="slider-wrapper">
                <?php $slider = new WP_Query(array('post_type' => 'slider_index', 'order' => 'ASC')); ?>
                <?php if ($slider->have_posts()) : ?>
                    <div class="slider">
                        
                        <ul class="items">
                            <?php  while ($slider->have_posts()) : $slider->the_post(); ?>
                                 <li>
                                     <?php the_post_thumbnail('full'); ?>
                                    <div class="banner">
                                    <?php the_content(); ?>
                                    <span class="button">
                                        <a href="<?php the_permalink(); ?>"><strong>Read More</strong></a>
                                    </span>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="slider"><h2>Место для слайдера</h2></div>
                <?php endif; ?>   
        </div>
    </header>