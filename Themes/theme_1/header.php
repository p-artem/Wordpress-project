<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); wp_title(); ?></title>
<?php wp_head(); ?>
</head>

<body>
<div class="karkas">
	<div class="header">
        <a href="<?php echo home_url(); ?>"><img class="logo" src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Extendet" /></a>
        <p class="head-contakt">
            <img src="<?php bloginfo('template_url'); ?>/images/head-mail.png" alt="" /> <a href="mailto:<?php bloginfo('admin_email'); ?>"><?php bloginfo('admin_email'); ?></a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_url'); ?>/images/head-mail.png" alt="" /><?php echo get_option('my_phone'); ?></p>
        <div class="head-soc"> 
             <?php if(!dynamic_sidebar('icons-header')): ?>
                <ul id="carousel" class="elastislide-list">
                    <li><p>Место для иконок</p></li>
                </ul>
            <?php endif; ?>
        </div>
        <div class="menu">
            <?php wp_nav_menu(array(
                                    'theme_location' => 'header-menu', 
                                    'container' => '',
                                    'menu_class'=> ''
                                ));  ?>
            <div class="serach">
            	<form action="">
                	<input name="s" class="search-txt" type="text" value="Search" onBlur="if(this.value=='')this.value='Search'" onFocus="if(this.value=='Search')this.value=''" />
                    <input type="image" src="<?php bloginfo('template_url'); ?>/images/search-bg.png" name="go" />
                </form>
            </div>
        </div>
    </div>