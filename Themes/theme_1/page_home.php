<?php 
/*   
Template Name: Главная страница
*/
?>
<?php get_header(); ?>

<?php $slider = new WP_Query(array('post_type' => 'slider_index', 'order' => 'ASC')); ?>

<?php if ($slider->have_posts()) : ?>
    <div class="slider">
        <div class="flexslider">
            <ul class="slides">
            <?php  while ($slider->have_posts()) : $slider->the_post(); ?>
                 <li>
                    <div class="slide-content">
                    <?php the_content(); ?>
                    </div>
                    <?php the_post_thumbnail('full'); ?>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    </div>
<?php else: ?>
    <div><h2>Место для слайдера</h2></div>
<?php endif; ?>   
              
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
      <div class="under-slider">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
      </div>
<?php endwhile; ?>
<?php else: ?>

<?php endif; ?>
    
    <div class="content-main">
        <?php
            $id = 2; //номер категории
            $posts_about = new WP_Query(array('cat' => $id, 'posts_per_page' => 4));
        ?>
        
        <?php if ($posts_about->have_posts()) :  ?>
           <div class="whatwedo">
            <?php while ($posts_about->have_posts()) : $posts_about->the_post(); ?>
               <div>
                   <h1><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h1>
                    <?php the_excerpt(); ?>
               </div>
            <?php endwhile; ?>
             </div>
        <?php else: ?>

        <?php endif; ?>
        
        <?php
            $id_work = 4; //номер категории
            $posts_work = new WP_Query(array('cat' => $id_work, 'posts_per_page' => 4, 'order' => 'DESC'));
        ?>
        
        <?php if ($posts_work ->have_posts()) :  ?>
        <h1 class="center-n"><span class="hnc">Our Latest Work</span> <span class="hnl">/ <a href="<?php echo get_category_link($id_work); ?> ">View All Portfolio</a></span></h1>
           <div class="our-works-main">
            <?php while ($posts_work->have_posts()) : $posts_work->the_post(); ?>
                <div class="our-works">
                    <a class="our-work-href" href="<?php the_permalink(); ?>">
                    <div class="our-work-short">
                   <img src="<?php bloginfo('template_url'); ?>/images/our-work-pic.png" alt="" />
                   <h3><?php the_title(); ?></h3>
                   <?php my_list_tags(); ?>
                    </div>
                   <img class="our-work-img" src="<?php echo get_post_meta($post->ID, 'portfolio_img', true); ?>" alt="" />
                </a>
                </div>
            <?php endwhile; ?>
             </div>
        <?php else: ?>

        <?php endif; ?>
       
        <div class="advance">
	<?php
            $id_choise = 11; //номер категории
            $posts_choise = new WP_Query(array('cat' => $id_choise, 'posts_per_page' => 3, 'order' => 'ASC'));
        ?>
        <?php if ($posts_choise->have_posts()) :  ?>
            <div class="why-us">
                <h1 class="center-n"><span class="hnc">Why Choose Us</span></h1>
                <div id="accordion">
                    <?php while ($posts_choise->have_posts()) : $posts_choise->the_post(); ?>
                        <h3><?php the_title(); ?></h3>
                        <div><?php the_content(); ?></div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="why-us">
                <h1 class="center-n"><span class="hnc">Why Choose Us</span></h1>
                    <p>Записи в формате аккордеона</p>
            </div>
        <?php endif; ?>
        
        <?php
            $id_service = 10; //номер категории
            $posts_service = new WP_Query(array('cat' => $id_service, 'posts_per_page' => 4, 'order' => 'ASC'));
        ?>
        <?php if ($posts_service->have_posts()) :  ?>
            <div class="our-services"> 
                <h1 class="center-n"><span class="hnc">Our Services</span></h1>
                <div id="tabs"> 
                    <ul>
                    <?php while ($posts_service->have_posts()) : $posts_service->the_post(); ?>
                        <li><a href="#tabs-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                    </ul>
                    <?php while ($posts_service->have_posts()) : $posts_service->the_post(); ?>
                        <div id="tabs-<?php the_ID(); ?>">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>    
        <?php else: ?>
             <div class="our-services"> 
                <h1 class="center-n"><span class="hnc">Our Services</span></h1>
                <p>Записи в формате вкладок</p>
            </div>
        <?php endif; ?>        
        </div>
           
    </div>
    
<?php get_footer(); ?>
