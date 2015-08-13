<?php get_header(); ?>

 <div class="page-title">
    <?php $cat =  get_the_category(); ?>
     <h1><?php the_title(); ?></h1>
    <p class="page-title-map">
        <a href="<?php echo home_url(); ?>">Home</a>  /  
        <a href="<?php echo get_category_link($cat[0]->cat_ID) ?>">
            <?php echo $cat[0]->name; ?>
        </a> / <?php the_title(); ?>
    </p>
    </div>
    
    <?php 
    $gallery = get_post_meta($post->ID, 'gallery', true);
    if(!empty($gallery)): $gallery = explode(',', $gallery);
    ?>
    <div class="slider-porfolio">
        <div class="flexslider">
            <ul class="slides">
            <?php foreach ($gallery as $item): ?>
                <li>            	
  	    	    <?php echo wp_get_attachment_image($item, 'full'); ?>
                    <img src="<?php bloginfo('template_url'); ?>/images/portfolio-shadow.png" alt="" />
  	    	</li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>  
    <?php endif;?>

    <div class="content-main">
    	
        <div class="content-left">
            <h2 class="projeact-descrip"><span><img src="<?php bloginfo('template_url'); ?>/images/progect-descript.jpg" alt="" /> Project Description</span></h2>
            <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
            <?php else: ?>
                <p>Нет записи</p>
            <?php endif; ?>
            </div>
        
        <div class="right-bar">
            <?php if(!dynamic_sidebar('single-portfolio')): ?>
                <h3><span>Categories</span></h3>
                <ul>
                    <?php wp_list_categories(array('title_li' => '')); ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <div class="clr"></div><br />
        <?php 
        
        $tags = strip_tags(my_list_tags(false));
        
        if($tags){
            $cat = get_the_category();
            $cat = $cat[0]->cat_ID;
            $args = array(
                'cat' => $cat,
                'tag' => $tags,
                $posts_per_page => 4,
                'post__not_in' => array($post->ID)
            );
        }
            $post_related = new WP_Query($args);
        ?>   
        
        <?php if ($post_related->have_posts()) :?>
            <h1 class="center-n"><span class="hnc">Related Projects</span></h1> 
            <div class="our-works-main">

            <?php  while ($post_related->have_posts()) : $post_related->the_post(); ?>

                <div class="our-works">
                    <a class="our-work-href" href="<?php the_permalink(); ?>">                    
                        <img class="our-work-img" src="<?php echo get_post_meta($post->ID, 'portfolio_img', true); ?>" alt="" />
                    </a>
                </div>
            <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="our-works">
                <p>Нет связанные проектов</p>
            </div>
        <?php endif; ?>           
    </div>

<?php get_footer(); ?>

