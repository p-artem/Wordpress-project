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
<?php $slides = get_slides(); 
    if(is_page()){
        $content = $slides[0];
        $key = 2;
    }
    elseif (is_category()){
        $content = $slides[1];
        $key = 3;
    }
     elseif (is_single()){
        $content = $slides[2];
        $key = 4;
    }else{
        $content = $slides[0];
        $key = 2;
    }   
?>
<body id="page<?php echo $key; ?>">
	<!--==============================header=================================-->
    <header>
    	<div class="main zerogrid">
                <h1><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" /></a></h1>
                    <?php wp_nav_menu(array(
                                    'theme_location' => 'header-menu', 
                                    'container' => 'nav',
                                    'menu_class'=> 'menu'
                                ));  ?>               
                <div class="clear"></div>
        </div>
        <div class="slider-wrapper">
            <?php  ?>
            <div class="slider">
            	<div class="banner">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </header>